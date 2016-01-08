<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpages extends CI_Model {
	
	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}

	function store_list(){
		$this->db->where('status',1);
		$q=$this->db->get('stores');
		if($q->num_rows()>0)return $q;
	}

}
