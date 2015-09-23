<?php
class Model_admin extends CI_Model{
	

	// pages
	function prd_cat(){
		//$this->db->where('');
		$query=$this->db->get('product_categories');
		if($query->num_rows() > 0)return $query->result();
	}

	function store_cat(){
		$this->db->where('status',1);
		$query=$this->db->get('store_categories');
		if($query->num_rows() > 0)return $query->result();
	}

	// OPERATION
	// save settings store
	function save_settings_store($type){
		if($_POST)
			if($type == 'basic'){
				$data['dispname'] = $this->input->post('dispname');
                $data['tag_title']= $this->input->post('tag_title');
                $data['owner']    = $this->input->post('owner');
                $data['description'] = $this->input->post('description');
                //$this->db->update('store_preferences',$data);
                print_r(get_login());
			}
	}
// CATEGORIES FUNCTIONS
	function add_category(){
		if(isset($_GET['category_name'])){
			$catname=$_GET['category_name'];
			$this->db->insert('product_categories',array(
				'cat_name' => $catname
				)
			);
			echo 'berhasil ditambahkan!!!';
		}
	}

	function edit_category($id){
		if(isset($_GET['category_name'])){
			$this->db->where('ID',$id);
			$this->db->update('product_categories',array(
					'cat_name'=>$this->input->get('category_name')
				)
			);
		}else{

		}
	}

}

//end of file