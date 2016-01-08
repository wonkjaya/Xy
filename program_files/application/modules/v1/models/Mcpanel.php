<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mcpanel extends CI_Model{
	public $id_user='';

	function __construct(){
		parent::__construct();
		$this->id_user=$this->user_id();
	}

	function user_id(){
		if(isset(session_userdata_get('loginData')['ID'])) return session_userdata_get('loginData')['ID'];
	}

	function get_store_id(){
		$id_user=$this->user_id();
		$this->db->where('user_id',$id_user);
		$this->db->select('ID');
		$this->db->limit(1);
		$q=$this->db->get('stores');
		return $q->row()->ID;
	}

	function get_soc_med_id($store_id){
		$this->db->select('sosmed_id');
		$this->db->where('store_id',$store_id);
		$row=$this->db->get('store_preferences')->row();
		return $row->sosmed_id;
	}

	function get_account_data(){
		$this->db->select(array('u.ID','u.user_email','ud.ktp_id','ud.fullname','ud.address','ud.phonenumber'));
		$this->db->where('u.ID',$this->user_id());
		$this->db->join('user_detail ud','ud.user_id=u.ID','left');
		$q=$this->db->get('users u');
		return $q->row();
	}

	function get_log_login_data(){
		$this->db->select(array(
				'L.*','Tl.nama_type'
			));
		$this->db->join('log_type Tl','L.kode_type=Tl.kode','left');
		$this->db->where('L.id_user',$this->user_id());
		$this->db->limit(10);
		$this->db->order_by('L.ID DESC');
		$q=$this->db->get('logs L');
		return $q->result();
	}

	function create_new_toko(){
		$q=$this->db->get_where('stores',array('user_id'=>$this->user_id()));
		if($q->num_rows() == 0):echo 'sd';
			//create new store
			$this->db->insert('stores',array('user_id'=>$this->user_id()));
			$id=$this->db->insert_id();
				if(!empty($id)){
					$this->db->insert('store_preferences',array('store_id'=>$id));
				}
		endif;
	}

	function detail_toko(){
		$this->db->select(array(
			's.ID as store_ID',
			's.user_id',
				'sp.ID as pref_ID',
				'sp.store_name',
				'sp.store_tag_title',
				'sp.store_address',
				'sp.store_description',
			'ud.ID as detail_ID',
			'ud.ktp_id',
			'ud.fullname',
			'ud.address',
			'ud.gender',
			'ud.phonenumber',
				'sc.ID as store_cat_ID',
				'sc.category_name',
			'sm.ID as sosmed_ID',
			'sm.facebook',
			'sm.twitter',
			'sm.googleplus',
			'sm.tumblr',
				'si.ID as service_ID',
				'si.no_telp_1',
				'si.no_telp_2',
				'si.bbm_1',
				'si.bbm_2',
				'si.whatsapp_1',
				'si.whatsapp_2',
				'si.email',
			'mt.ID as meta_ID',
			'mt.meta_name',
			'mt.meta_tag',
			'mt.meta_description'
			)
		);
		$this->db->join('users u','s.user_id = u.ID','left');
		$this->db->join('user_detail ud','ud.user_id = u.ID','left');
		$this->db->join('store_preferences sp','sp.store_id = s.ID','left');
		$this->db->join('store_categories sc','sc.ID = s.store_cat_id','left');
		$this->db->join('service_info si','si.ID = s.service_id','left');
		$this->db->join('social_media sm','sm.ID = s.sosmed_id','left');
		$this->db->join('metas mt','mt.ID = s.meta_id','left');
		$this->db->where('s.user_id',$this->user_id());
		$q=$this->db->get('stores s');
		return $q->row();
	}

	function save_store_info(){
		$error=true;
		$id_store=$this->get_store_id();
		if(isset($_POST['submit_1']) && $id_store!=''){
			$store_name=$this->input->post('store_name');
			$tagline=$this->input->post('tagline');
			$description=$this->input->post('description');
			$category=$this->input->post('category');
			$address=$this->input->post('address');
			$data=array(
				'store_name'=>$store_name,
				'store_tag_title'=>$tagline,
				'store_address'=>$address,
				'store_cat_id'=>$category,
				'store_description'=>$description,
			);
			$this->db->where('store_id',$id_store);
			$this->db->update('store_preferences',$data);
			$error=false;
		}elseif(isset($_POST['submit_2']) && $id_store!=''){
			$arr_key=array('email',
				'no_telp_1',
				'no_telp_2',
				'no_telp_3',
				'no_telp_4',
				'bbm_1','bbm_2',
				'whatsapp_1','whatsapp_2'
				);
			foreach($arr_key as $key){
				$data[$key]=$this->input->post($key);
			}
			$id_service=$this->get_id_service();
			$this->db->where('ID',$id_service);
			$this->db->update('service_info',$data);
			$error=false;
		}elseif(isset($_POST['submit_3']) && $id_store!=''){
			//print_r($_POST);
			$sosmed_id=$this->get_soc_med_id($id_store);
			// nama-field => nama_form
			$key_val=array(
				'facebook'=>'fb',
				'twitter'=>'twitter',
				'googleplus'=>'gplus',
				'tumblr'=>'tumblr',
				);
			foreach($key_val as $key=>$val){
				$data[$key]=$this->input->post($val);
			}
			$this->db->where('ID',$sosmed_id);
			$this->db->update('social_media',$data);
			$error=false;
		}
		if($error == false){
			redirect(get_link(1,'c1').'/mystore?edit');
		}
	}

	function get_id_service(){
		$id_user=$this->user_id();
		$this->db->where('s.user_id',$id_user);
		$this->db->select('service_id');
		$this->db->limit(1);
		$this->db->join('stores s','sp.store_id=s.ID','left');
		$r=$this->db->get('store_preferences sp')->row();
		return $r->service_id;
	}

	function get_categories(){
		$this->db->select(array('ID','category_name'));
		$this->db->where('status',1);
		$q=$this->db->get('store_categories');
		return $q->result();
	}

	function save_info(){
		if($_POST){
			$id_user=$this->user_id();
			$new_p=$this->input->post('new_pass');
			$conf_p=$this->input->post('conf_pass');
			if($new_p === $conf_p){
				$new_p=md5($new_p);
				$this->db->where('ID',$id_user);
				$this->db->update('users',array('user_pass'=>$new_p));
			}
			redirect($this->uri->uri_string());
		}
	}

}

//end of file
//created on sept-15-'15