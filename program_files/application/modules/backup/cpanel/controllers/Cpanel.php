<?php

class Cpanel extends CI_Controller{
	protected $default_uri='cpanel';

	function __construct(){
		parent::__construct();
		$this->load->model('mcpanel','model');
		$this->load->helper('date');
		$this->check_login();
	}


	function check_login(){
		$session=$this->session->userdata('login_session');
		if(!isset($session)) redirect('account');
		exit;
	}
	
	function index(){
		echo site_url();
	}
	
	function un(){
		unset_userdata();
		redirect('admin');
	}
	
	// PAGES
	// created 12 jul 15
	function dashboard($segment=''){
		get_session('',true);// jika belum login maka langsung redirect ke login 
		$view_data=array(
			'body'=>'Dashboard',
			'header'=>'true',
			'footer'=>'true'
		);
		// HOME
		if($segment=='statistics'){
			$title = 'Statistics';
			$loader_view = 'statistics';
			$active_menu = array('group'=>'home','active'=>'statistic');
		}elseif($segment=='about_app'){
			$title = 'About App';
			$loader_view = 'about_app';
			$active_menu = array('group'=>'home','active'=>'about_app');
		}
		// PRODUCTS
		elseif($segment=='add_product'){
			$title = 'Add Product';
			$loader_view = 'add_product';
			$active_menu = array('group'=>'product','active'=>'add_product');
		}elseif($segment=='browse_product'){
			$title = 'Browse Product';
			$loader_view = 'browse_product';
			$active_menu = array('group'=>'product','active'=>'browse_product');
		}elseif($segment=='categories'){
			$title = 'Categories';
			$loader_view = 'categories';
			$active_menu = array('group'=>'product','active'=>'categories');
		}
		// PERSONAL
		elseif($segment=='acc_information'){
			$title = 'Account Info';
			$loader_view = 'acc_information';
			$active_menu = array('group'=>'personal','active'=>'acc_information');
		}elseif($segment=='acc_settings'){
			$title = 'Account Settings';
			$loader_view = 'acc_settings';
			$active_menu = array('group'=>'personal','active'=>'acc_settings');
		}
		// MYSTORE
		elseif($segment=='settings'){
			$title = 'Settings';
			$loader_view = 'settings';
			$active_menu = array('group'=>'mystore','active'=>'settings');
		}else{
			not_found();
		}

		$data=array(
			'title'=>$title,
			'view_loader'=>$loader_view,
			'actv_menu'=>$active_menu
		);
		view($view_data,$data);
	}
	// S E G M E N T S
	// created 12 jul 15
// HOME
	function statistics(){
		$this->load->view('statistics');
	}
	function about_app(){
		$this->load->view('about_app');
	}
//PRODUCT	
	function add_product(){
		$this->load->helper('form');
		$data['categories']=$this->model->prd_cat();
		$this->load->view('form_product',$data);
	}

	function browse_product(){
		$this->load->view('browse_products');
	}
	//categories
	function categories(){
		$this->load->helper('form');
		$data['categories']=$this->model->prd_cat();
		$this->load->view('categories',$data);
	}

	function add_category(){
		$this->model->add_category();
	}

	function edit_category($id=0){
		$title='Edit Category';
		$loader_view='edit_category';
		$active_menu=array('group'=>'product','active'=>'categories');
		$view_data=array(
			'body'=>'Dashboard',
			'header'=>'true',
			'footer'=>'true'
		);
		$edit=$this->model->edit_category($id);
		$data=array(
			'title'=>$title,
			'view_loader'=>$loader_view,
			'actv_menu'=>$active_menu,
			'data'=>$edit
		);
		view($view_data,$data);
	}
//PERSONAL
	function acc_information(){
		$this->load->helper('form');
		$this->load->view('acc_information');
	}

	function acc_settings(){

	}

	function edit_profile(){
		$this->model->save_profile();
	}
// STORE
	function settings(){
		$this->load->helper('form');
		$data['categories']=$this->model->store_cat();
		$this->load->view('settings',$data);
	}
// END MAIN MENU

// SETTINGS STORE 
	function save_settings_store($type){
		$this->model->save_settings_store($type);
	}



}
?>