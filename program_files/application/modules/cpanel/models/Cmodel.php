<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cmodel extends CI_Model{
	public $id_user='';

	function __construct(){
		parent::__construct();
		$this->id_user=$this->user_id();
	}
	function user_id(){
		return session_userdata_get('loginData')['ID'];
	}

	function get_account_data(){
		$this->db->where('u.ID',$this->user_id());
		$this->db->join('user_detail ud','ud.user_id=u.ID','left');
		$q=$this->db->get('users u');
		return $q->row();
	}

}

//end of file
//created on sept-15-'15