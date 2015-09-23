<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ref_model extends CI_Model {
	
	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	function get_user_ref($code_ref=''){
		$data=array(
			'reference_code'=>$code_ref,
		);
		$this->db->where($data);
		$ref=$this->db->get('users')->row();
		if($ref->ID == 0)
			return '';
		else 
			return $ref->ID;
	}

}
