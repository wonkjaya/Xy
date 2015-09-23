<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html'));
	}
	
	public function index(){
		$this->services();
	}
	
	function store(){
		$data['ac_menu']=2;
		$data['title']='Daftar Toko';
		$this->load->view('user_templates/header',$data);
		$this->load->view('Store',$data);
		$this->load->view('user_templates/footer');
	}
	
	function aboutus(){
		$data['ac_menu']=3;
		$data['title']='Tentang Kami';
		$this->load->view('user_templates/header',$data);
		$this->load->view('tentang-kami',$data);
		$this->load->view('user_templates/footer');
	}
}
