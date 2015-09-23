<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MX_Controller {
	public $controller='cpanel';
	public $model='cmodel';

	function __construct(){
		parent::__construct();
		$this->load->model($this->model,'m');
		$this->load->helper(array('html'));
		$this->is_login();
	}

	function is_login(){
		if(session_userdata_get('loginData') == ''){
			redirect('Auth/login');
		}
	}

	function logout(){
		$this->load->driver('session');
		$this->session->sess_destroy();
		redirect('Auth');
	}

	function index(){
		$this->dashboard();
	}

	function dashboard()
	{
		$data['controller']=$this->controller;
		$data['title']='Dashboard';
		$data['menu_ac']=1;
		$this->load->view('Header',$data);
		$this->load->view('Menu');
		// mengambil data akun 
		$data['akun_data']=$this->m->get_account_data();
		$this->load->view('Dashboard',$data);
		$this->load->view('Footer');
	}

}
