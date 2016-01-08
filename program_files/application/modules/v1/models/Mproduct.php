<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mproduct extends CI_Model{
	public $id_user='';

	function __construct(){
		parent::__construct();
		$this->id_user=$this->user_id();
	}

	function user_id(){
		return session_userdata_get('loginData')['ID'];
	}

	function get_all_categories(){
		$q=$this->db->get('product_categories');
		if($q->num_rows()>0)return $q;
	}

	function create_product(){
		if(!$_POST)return;
		print_r($_POST);
		$meta_id=$this->create_meta();
		if($meta_id){
			$image_id=$this->create_image_data();
			if($image_id){
				$prd_code=$this->input->post('prd_code');
				$prd_category=$this->input->post('prd_category');
				$data=array(
					'user_id'=>$this->user_id(),
					'prd_code'=>$prd_code,
					'meta_id'=>$meta_id,
					'category_id'=>$prd_category,
				);
				$res=$this->db->insert('products',$data);
				if($res)$id=$this->db->insert_id();
				$this->create_detail((isset($id)?$id:0),$image_id);
			}
		}
	}

	function create_detail($id,$image_id){
		if($id==0)return;
		$prd_name=$this->input->post('prd_name');
		$prd_price_buy=$this->input->post('prd_price_buy');
		$prd_price_sell=$this->input->post('prd_price_sell');
		$prd_discount=$this->input->post('prd_discount');
		$prd_description=$this->input->post('prd_description');
		$data=array(
				'prd_id'=>$id,
				'prd_name'=>$prd_name,
				'prd_price_buy'=>$prd_price_buy,
				'prd_price_sell'=>$prd_price_sell,
				'prd_discount'=>$prd_discount,
				'prd_description'=>$prd_description,
				'image_id'=>$image_id,
			);
		$this->db->insert('product_detail',$data);
	}

	function create_image_data(){
		$data=array(
				'image1'=>'noimage.png',
				'image2'=>'noimage.png',
				'image3'=>'noimage.png',
				'image4'=>'noimage.png'
			);
		$q=$this->db->insert('product_images',$data);
		if($q)return $this->db->insert_id();
	}

	function create_meta(){
		$meta_name=$this->input->post('meta_name');
		$meta_tag=$this->input->post('meta_tag');
		$meta_description=$this->input->post('meta_description');
		$data=array(
				'meta_name'=>$meta_name,
				'meta_tag'=>$meta_tag,
				'meta_description'=>$meta_description
			);
		$res=$this->db->insert('metas',$data);
		if($res)return $this->db->insert_id();
	}

// GET DATA
	function get_products(){
		$userid=$this->user_id();
		//$this->db->where('userid',$userid);
		$q=$this->db->get('products');
		if($q->num_rows() > 0)return $q->result();
	}

	function category_save(){
		if(isset($_GET['save'])){
			$id=$_GET['ID'];
			$name=$_GET['category_name'];
			$this->db->where('ID',$id);
			$this->db->update('product_category',array('category_name' =>$name));
		}
	}
	
}
//end of file