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
			redirect('auth/login');
		}
	}

	function logout(){
		$this->load->driver('session');
		$this->session->sess_destroy();
		redirect('auth');
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
		$data['account_data']=$this->m->get_user_record();
		// mengambil jumlah referal yang sudah di dapatkan
		$data['count_referal']=$this->m->get_referal_count();
		$this->load->view('Dashboard',$data);
		$this->load->view('Footer');
	}

	function penawaran(){
		$data['controller']=$this->controller;
		$data['title']='Penawaran';
		$data['menu_ac']=2;
		$this->load->view('Header',$data);
		$this->load->view('Menu');
		// mengambil data akun 
		$data['websites']=$this->m->get_all_websites();
		// mengambil jumlah referal yang sudah di dapatkan
		$data['penawaran']=$this->m->get_penawaran();
		$this->load->view('Penawaran',$data);
		$this->load->view('Footer');
	}

}
