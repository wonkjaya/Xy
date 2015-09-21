<?php
class Amodel extends CI_Model{
	function login(){
		$email=$this->input->post('email');
		$pass=$this->input->post('password');
		$data=array('user_email'=>$email,'user_pass'=>MD5($pass),'user_status'=>1);
		//get user_email,level,displayname
		$this->db->where($data);
		$this->db->join('user_detail','user_detail.user_id=users.ID','left');
		$q=$this->db->get('users');
		// if have user
		if($q->num_rows() >= 1){echo 'asd';
			$r=$q->row();
			$sess_arr=array(
				'user_email'=>$r->user_email,
				'level'=>$r->user_level,
				'disp_name'=>$r->display_name,
				);
			set_session('login',$sess_arr); // user_helper.php
			return true;
		}
			return false;
	}
	
	//28 jun 15 => edited 03 jul 15
	function register(){
		if($_GET){
			$user_email=$this->input->get('user_email');
			$user_fullname=$this->input->get('user_fullname');
			$user_address=$this->input->get('user_address');
			$user_phone=$this->input->get('user_phonenumber');
			// check validation again
			$check=$this->check_validation($user_email,$user_fullname,$user_address,$user_phone);
			return $check;
		}
		return '';
	}
	
	//edited 03 jul 15
	function check_validation($user_email,$user_fullname,$user_address,$user_phone){ //type = field db
		//cek email validality
		$err='';
		//echo strpos($user_email,"@").'asd';
		if(strpos($user_email,"@") > 0){ 
			$this->db->where(array('user_email'=>$user_email));
			$q=$this->db->get('users');
			if($q->num_rows() > 0) { // jika email sudah ada .
				$status=$q->row()->user_status;
				if($status == 0){ //jika status=0 :> sudah mendaftar sebelumnya(blm aktif)
					$err=cur_lang('login','alredy_registered',false);
				}elseif($status == 1){ // jika status =1 :>akun sudah aktif
					$err=cur_lang('login','alredy_active_account',false);
				}elseif($status == 2){ //jika akun terbanned
					$err=cur_lang('login','banned_account',false);
				}
			}
		}else{$err=cur_lang('login','register_email_unavailable',false);}
		// cek fullname
		if(strlen($user_fullname) < 6){
			$err = cur_lang('login','register_error',false);
		}
		// cek address
		if(strlen($user_address) < 6){
			$err = cur_lang('login','register_error',false);
		}
		// cek phone number
		if(strlen($user_phone) < 6){
			$err = cur_lang('login','register_error',false);
		}
		//cek ada error terdeteksi?
		if(strlen($err) > 0){
			echo $err;
			return 'error';
		}else{ // jika semua berhasil maka insert database
			$user_data=array(
				'user_email'=>$user_email,
				'user_registered_date'=>date('Y-m-d G:i:s'),
				'user_activation_key'=>md5($user_email.$user_phone.date('g:i:s'))
			);
			$this->db->insert('users',$user_data);
			$id=$this->db->insert_id();
			$user_det_data=array(
				'user_id'=>$id,
				'fullname'=>$user_fullname,
				'domicili_address'=>$user_address
			);
			$this->db->insert('user_detail',$user_det_data);
			return 'sukses';
		}
	}

	// 26 jun 15
	function forgotPassword($email=''){
		if(isset($_GET['email'])) $email=$this->input->get('email');
		if(empty($email))return cur_lang('login','ForgotErrEmpty');
		
		$this->db->limit(1);
		$this->db->where('user_email',$email);
		$this->db->join('user_detail','users.ID = user_detail.user_id','left');
		$data=$this->db->get('users');
		$res=$data->row();
		//print_r($res);

		$num=$data->num_rows();
		if($num == 0) return cur_lang('login','ForgotErrNotRegister');
		//if success
		//setting config
		$data=array(
			'receipent'	=> $email,
			'name'		=> $res->full_name,
		);
		send_email($data,'FP');//user_helper
		return cur_lang('login','ForgotSuccessSent');
	}

	function confirm($activation_code=''){// www...com/confirm/gt4gsffvah4h22habdbvdn
		if($activation_code != ''){
			$this->db->where('user_activation_key',$activation_code);
			$q=$this->db->get('users');
			$new_pass=substr($q->row()->user_activation_key,rand(0,10),6);
			if($q->num_rows() > 0){
				//set session userID
				set_session('userId',$q->row()->ID);
				// data untuk update
				$data_to_update=array(
					'user_activation_key'=>'', // mengkosongkan kode
					'user_pass'=>md5($new_pass),
					'user_status'=>1
				);
				// update data
				$this->db->where('ID',$q->row()->ID);
				$this->db->update('users',$data_to_update);

				return "sukses";
			}
		}
	}

}