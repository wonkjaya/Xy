<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function generateRandomString($length = 6) {
		$code=substr(str_shuffle("23456789abcdefghijkmnpqrstuvwxyz"), 0, $length);
		$q=$this->db->get_where('members',array('referal_kode'=>$code));
		if($q->num_rows() == 0){
			return $code;
		}else{
			$this->generateRandomString();
		}
	}
	
	function register(){
		if($_POST){
			// initials
			$fullName=$this->input->post('fullName');
			$email=$this->input->post('Email');
			$reEmail=$this->input->post('reEmail');
			$address=$this->input->post('address');
			$phoneNumber=$this->input->post('phoneNumber');
			$confirm_code=md5($email.date('Ymd'));
			$ref_from=session_userdata_get('ref');
			// check param
			if($email !== $reEmail) return '<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>';
			if(strlen($fullName) < 1) return '<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>';
			if(strlen($address) < 1) return '<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>';
			if($this->check_email_available('email_user',$email) == 1) return '<div class="alert alert-danger" role="alert">Email Sudah Terdaftar! <a href="#forgot"> Lupa?</a></div>';
			// jika filter diatas bernilai benar(semua field sesuai yang dibutuhkan)
			$data=array(
				'email_user'=>$email,
				'konfirmasi_kode'=>$confirm_code,
				'parent_ref'=>$ref_from
			);
			$this->db->insert('members',$data);
			$id=$this->db->insert_id();
			$data=array('id_user'=>$id,'nama_lengkap'=>$fullName,'alamat'=>$address,'no_telp'=>$phoneNumber);
			$this->db->insert('member_detail',$data);
			$this->insert_ref_code($ref_from);
			$message="untuk konfirmasi akun pendaftaran anda , ikuti link ini : ".site_url('User/confirm_registration/'.$confirm_code);
			send_register_confirm($email,$message);	//utilities helper
			return 'berhasil';
		}
		return ;
	}
	
	function check_email_available($field,$value){
		$data=array(
			$field => $value
		);
		$this->db->where($data);
		$num=$this->db->get('members')->num_rows();
		return $num;
	}

	function insert_ref_code($ref_from){
		$append=array('0','00','000');
		$ref_id=$this->db->insert_id();
		$ref_code=$ref_from.$ref_id;
		$minus=(4-strlen($ref_code));
		if($minus > 0) $ref_code = $ref_code.$append[ $minus-1 ];
		$this->db->where('ID',$ref_id);
		$this->db->update('members',array('referal_kode'=>$ref_code));
	}
	
	function login(){
		if($_GET):
			$data=array(
				'email_user'=>$this->input->get('email'),
				'password'=>md5($this->input->get('password'))
			);
			$this->db->where($data);
			$q=$this->db->get('members');
			if($q->num_rows() == 0){
				echo '<div class="alert alert-danger" role="alert">username dan email salah!</div>';
				return ;
			}else{
				$status=$q->row()->status;
				if($status == 0){
					echo '<div class="alert alert-warning" role="alert">Akun Belum Terverifikasi! </div>';
					return ;
				}
				if($status == 2){
					echo '<div class="alert alert-warning" role="alert">Akun Terblokir. Harap Hubungi Cs Kami.</div>';
					return ;
				}
				$data=array(
					'ID'=>$q->row()->ID,
					'email'=>$q->row()->email_user,
				);
				$this->session->set_userdata('loginData',$data);

				echo 'sukses';
			}
		endif;
	}

	function confirm_registration($code){
		$this->db->where('konfirmasi_kode',$code);
		$data=$this->db->get('members')->row();
		if(isset($data->ID)){
			// set flash untuk ID
			session_flashdata_set('id_user_conf',$data->ID);
			return '<div class="alert alert-success" role="alert">Akun berhasil terkonfirmasi, Harap Pilih username dan password sesuai dengan keinginan anda</div>';
		}else{
			return '<div class="alert alert-danger" role="alert">Error: Terjadi kesalahan saat authentikasi</div>';
		}
		return '';
	}

	function registering_user(){
		if($_GET){
			$password=$this->input->get('password');
			$confirm=$this->input->get('confirm');
			$id=$this->input->get('id');
			//check valid input strlen($password) < 6
			if($id == '') return '<div class="alert alert-warning" role="alert">Expired/Timeout.</div>';
			if(strlen($password) < 6 ) 
				return '<div class="alert alert-danger" role="alert">Panjang karakter PASSWORD kurang dari 6 Huruf.</div>';
			if($confirm != $password) return '<div class="alert alert-danger" role="alert">Password Tidak Cocok.</div>';
			// updating username from users table
			$data=array(
				'password'=>md5($password),
				'konfirmasi_kode'=>'',
				'referal_kode'=>$this->generateRandomString(),
				'status'=>1);
			$this->db->update('members',$data,array('ID'=>$id));
			return 'Akun Berhasil Diaktifkan, Silahkan <a href="#" id="login" data-toggle="modal" data-target="#modal_login">Login</a>.';
		}
	}

	function forgot_password(){
		if($_GET){
			$email=$this->input->get('user_email');
			$user = $this->get_user_record(array('email_user'=>$email));
			if($user != ''){
				if($user->ID != ''){
					if($user->status == 2) return '<div class="alert alert-danger" role="alert">Akun Terblokir, Silahkan Hubungi Cs Kami.</div>';
					// update confirmation code
					$this->db->update('members',array('konfirmasi_kode'=>md5($email.date('dmysg'))),array('ID'=>$user->ID));
					return '<div class="alert alert-success" role="alert">Recovery Sudah dikirim ke Email.</div>';
				}
			}
			return '<div class="alert alert-warning" role="alert">Akun belum Terdaftar.</div>';
		}
		return ;
	}

	function get_user_record($data=array()){
		$this->db->where($data); // bisa diisi dengan Email Atau field Lainnya. berupa array
		$res=$this->db->get('members');
		if($res->num_rows() > 0){
			return $res->row();
		}
		return '';
	}

	// dahsboard
	function get_referal_count($id){
		$query=$this->db->query("SELECT COUNT(`ID`) as `count` FROM members WHERE parent_ref = ".$this->db->escape($id)." AND status <> 0")->row();
		return $query->count;
	}


}

//end of file
