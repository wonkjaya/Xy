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

	function get_user_record(){
		$this->db->where('m.ID',$this->id_user); // bisa diisi dengan Email Atau field Lainnya. berupa array
		$this->db->join('member_detail md','md.id_user=m.ID','left');
		$res=$this->db->get('members m');
		if($res->num_rows() > 0){
			return $res->row();
		}
		return null;
	}

	function get_referal_count(){
		$query=$this->db->query("SELECT COUNT(`ID`) as `count` FROM members WHERE parent_ref = ".$this->id_user." AND status <> 0");
		$q=$query->row();
		return $q->count;
	}

	function get_all_websites(){
		$this->db->order_by('url_website ASC');
		$q=$this->db->get('perusahaan_websites');
		return ($q->num_rows() > 0)?$q->result():null;
	}

	function get_penawaran(){
		$this->db->order_by('status DESC');
		$q=$this->db->get('komisi_jenis');
		return ($q->num_rows() > 0)?$q->result():null;
	}

}

//end of file
//created on sept-15-'15