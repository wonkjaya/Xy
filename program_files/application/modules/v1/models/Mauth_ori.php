<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*function generateRandomString($length = 6) {
		$code=substr(str_shuffle("23456789abcdefghijkmnpqrstuvwxyz"), 0, $length);
		$q=$this->db->get_where('users',array('referal_kode'=>$code));
		if($q->num_rows() == 0){
			return $code;
		}else{
			$this->generateRandomString();
		}
	}*/
	
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
			$data=array(
				'fullName'=>$fullName,
				'email'=>$email,
				'reEmail'=>$reEmail,
				'address'=>$address,
				'phoneNumber'=>$phoneNumber
			);
			// check param
			if($email !== $reEmail) : $data['msg']='<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>'; return $data; endif;
			if(strlen($fullName) < 1): $data['msg']= '<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>'; return $data; endif;
			if(strlen($address) < 1): $data['msg']= '<div class="alert alert-danger" role="alert">Email dan konfirmasi Tidak cocok!</div>'; return $data; endif;
			if($this->check_email_available('user_email',$email) == 1): $data['msg']= '<div class="alert alert-danger" role="alert">Email Sudah Terdaftar! <a href="#forgot"> Lupa?</a></div>'; return $data; endif;
			// jika filter diatas bernilai benar(semua field sesuai yang dibutuhkan)
			$data=array(
				'user_email'=>$email,
				'user_registered_date'=>date('Y-m-d'),
				'user_activation_key'=>$confirm_code
			);
			$this->db->insert('users',$data);
			$id=$this->db->insert_id();
			$data=array('user_id'=>$id,'fullname'=>$fullName,'domicili_address'=>$address,'private_phonenumber'=>$phoneNumber);
			$this->db->insert('user_detail',$data);
			//$this->insert_ref_code($ref_from);
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
		$num=$this->db->get('users')->num_rows();
		return $num;
	}
	
	function login(){
		if($_GET):
			$email=$this->input->get('email');
			$data=array(
				'user_email'=>$email,
				'user_pass'=>md5($this->input->get('password'))
			);
			$this->db->where($data);
			$q=$this->db->get('users');
			if($q->num_rows() == 0){
				echo '<div class="alert alert-danger" role="alert">Email dan Password salah!</div>';
					$log_data=array(
						'kode_type'=>'200', // type login
						'time'=>date('Y-m-d g:i:s'),
						'id_user'=>$this->get_id_from_email($email),
						'ip_address'=>$this->input->ip_address(),
						'user_agent'=>$this->input->user_agent(),
						'status'=>'100', //error
						'keterangan'=>'Gagal Login');
				$this->insert_log($log_data);
				return ;
			}else{
				$status=$q->row()->user_status;
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
					'email'=>$q->row()->user_email,
				);
				$this->session->set_userdata('loginData',$data);
					$log_data=array(
						'kode_type'=>'200', // type login
						'time'=>date('Y-m-d g:i:s'),
						'id_user'=>$this->get_id_from_email($email),
						'ip_address'=>$this->input->ip_address(),
						'user_agent'=>$this->input->user_agent(),
						'status'=>'111', // sukses
						'keterangan'=>'Sukses Login');
				$this->insert_log($log_data);
				echo '<div class="alert alert-success" role="alert">Sukses Login. akan redirect beberapa saat.</div>';
			}
		endif;
	}

	function get_id_from_email($email=''){
		$this->db->where('user_email',$email);
		$q=$this->db->get('users');
		if($q->num_rows() > 0):
			return $q->row()->ID;
		endif;
		return 0;  //tidak ada data
	}

	function insert_log($data){
		if(is_array($data)):
			$this->db->insert('logs',$data);
		endif;
	}

	function confirm_registration($code){
		$this->db->where('user_activation_key',$code);
		$data=$this->db->get('users')->row();
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
				'user_pass'=>md5($password),
				'user_activation_key'=>'',
				'user_status'=>1);
			$this->db->update('users',$data,array('ID'=>$id));
			return 'Akun Berhasil Diaktifkan, Silahkan <a href="#" id="login" data-toggle="modal" data-target="#modal_login">Login</a>.';
		}
	}

	function forgot_password(){
		if($_GET){
			$email=$this->input->get('user_email');
			$user = $this->get_user_record(array('user_email'=>$email));
			if($user != ''){
				if($user->ID != ''){
					if($user->status == 2) return '<div class="alert alert-danger" role="alert">Akun Terblokir, Silahkan Hubungi Cs Kami.</div>';
					// update confirmation code
					$this->db->update('users',array('user_activation_key'=>md5($email.date('dmysg'))),array('ID'=>$user->ID));
					return '<div class="alert alert-success" role="alert">Recovery Sudah dikirim ke Email.</div>';
				}
			}
			return '<div class="alert alert-warning" role="alert">Akun belum Terdaftar.</div>';
		}
		return ;
	}

	function get_user_record($data=array()){
		$this->db->where($data);
		$q=$this->db->get('users');
		return $q->row();
	}


}

//end of file
