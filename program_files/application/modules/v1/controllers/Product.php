<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {
	public $controller='product';
	public $model='Mproduct';

	function __construct(){
		parent::__construct();
		$this->load->model($this->model,'m');
		$this->load->helper(array('html','link'));
		$this->is_login();
	}

	function is_login(){
		if(session_userdata_get('loginData') == ''){
			redirect('auth/login');
		}
	}

	function index(){
		$this->home();
	}

	function home(){
		$data['title']='Produk';
		$data['menu_ac']=3;
		$this->load->view(getcontroller('c1').'/Header',$data);
		$this->load->view('Menu');
		$data['products']=$this->m->get_products();// get where id user
		$this->load->view(getcontroller('p2').'/Product_page',$data);
		$this->load->view(getcontroller('c1').'/Footer');
	}

	function new_product(){
		$data['title']='Input Produk';
		$data['menu_ac']=3;
		$this->m->create_product(); // if submit
		$this->load->helper('form');
		$this->load->view(getcontroller('c1').'/Header',$data);
		$this->load->view('Menu');
		$data['categories']=$this->m->get_all_categories();
		$this->load->view(getcontroller('p2').'/Product_form',$data);
		$this->load->view(getcontroller('c1').'/Footer');
	}

	function Categories(){
		$this->m->category_save();	//if ?save
		$data['title']='Kategori Produk';
		$data['menu_ac']=3;
		$this->m->create_product(); // if submit
		$this->load->helper('form');
		$this->load->view(getcontroller('c1').'/Header',$data);
		$this->load->view('Menu');
		$data['categories']=$this->m->get_all_categories();
		$this->load->view(getcontroller('p2').'/Categories',$data);
		$this->load->view(getcontroller('c1').'/Footer');
	}
}