<?php

class Account extends CI_Controller{

	protected $default_uri='account';
	protected $model_name='Amodel';

	function __construct(){
		parent::__construct();
		$this->load->model($this->model_name,'model');
		$this->load->helper('date');
	}
	
	function login(){
		$data=array();
		check_login(false); // jika sudah login maka otomatis redirect ke dashboard [user_helper.php] 
		//echo $this->session->get_userdata('language');exit;
		$this->load->helper(array('form','loader'));
		$config = array(
			array(
					'field' => 'email',	'label' => 'Email',	'rules' => 'required'
			),
			array(
					'field' => 'password',	'label' => 'Password',	'rules' => 'required'
			)
		);
		$fv = form_validasi($config); //load form validation [loader.php]
		/* return
			TRUE = semua validasi complete
			FALSE = jika salah atau belum submit
		*/
		if ($fv == TRUE){
			if($this->model->login() != false){// set session data berada di model
				redirect('admin/dashboard/statistics');
			}else{
				$data['login_error']=cur_lang('login','login_error',false);
			}
		}
		$data['title']='Login';
		head($data);
		$this->load->view('login',$data);
	}
	// 28 jun 15
	function register(){
		$data=array();
		check_login(true); // jika sudah login maka otomatis redirect ke dashboard [user_helper.php] 
		$reg=$this->model->register(); // check validation;
		//echo $reg;
		if($reg == 'sukses'){
			echo cur_lang('login','register_success');
		}elseif($reg == ''){
			//echo $this->session->get_userdata('language');exit;
			$this->load->helper(array('form','loader'));
			$data['title']='Register';
			head($data);
			$this->load->view('register',$data);
		}
	}
	
	function check_validation($type='email'){ 
		if($type == 'email'){
			if(trim('@',$_GET['email']))
				echo '<i class="glyphicon glyphicon-remove" style="color:red"></i>';
			else
				echo '<i class="glyphicon glyphicon-ok" style="color:green"></i>';
		}elseif($type == 'fullname'){
			if(strlen($_GET['fullName']) < 2) 
				echo '<i class="glyphicon glyphicon-remove" style="color:red"></i>';
			else
				echo '<i class="glyphicon glyphicon-ok" style="color:green"></i>';
		}elseif($type == 'address'){
			$address=$_GET['address'];
			if(strlen($address) < 6)
				echo '<i class="glyphicon glyphicon-remove" style="color:red"></i>';
			else
				echo '<i class="glyphicon glyphicon-ok" style="color:green"></i>';
		}else{
			echo '<i class="glyphicon glyphicon-remove" style="color:red"></i>';
		}
	}
	
	// created for 26 jun 15
	function forgotPassword($email=''){
		$data=$this->model->forgotPassword(str_replace(':at:','@',$email));
		echo $data;
	}

	// created 09-08-15

	function confirm($code){
		$conf=$this->model->confirm($code);
		if($conf == "sukses"){
			redirect($this->default_uri.'/setting_user_pass');
		}else{
			redirect($this->default_uri.'/error_confirm');
		}
	}

	function error_confirm(){
		echo 'url not valid';
	}

	function setting_user_pass(){
		$res=$this->model->set_user_pass();
		if($res == 'berhasil'){
			echo 'username berhasil di setting';
		}else{
			$this->load->helper(array('form','loader'));
			$data['title']='Setting Username & Password';
			head($data);
			$this->load->view('form_set_username',$data);
		}
	}




}
?>