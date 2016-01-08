<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlog extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function insert_log($data){
		if(is_array($data)):
			$this->db->insert('logs',$data);
		endif;
	}

}