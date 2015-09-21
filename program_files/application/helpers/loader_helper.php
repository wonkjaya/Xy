<?php
// LOADER
function js($path,$is_name=true){
	if(is_array($path)){
		foreach($path as $path){
			if($is_name == false)$name=$path;
				else $name=str_replace(DEF_FOLDER,'',base_url('_assets/js/'.$path));
			echo '<script src="'.$name.'"></script>';	
		}
	}else{
		if($is_name==false)$name=$path;
			else $name=str_replace(DEF_FOLDER,'',base_url('_assets/js/'.$path));
		echo '<script src="'.$name.'"></script>';	
	}
}
function css($path,$is_name=true){
	if(is_array($path)){
		foreach($path as $path){
			if($is_name==false)$name=$path;
				else $name=str_replace(DEF_FOLDER,'',base_url('_assets/css/'.$path));
			echo '<link rel="stylesheet" href='.$name.'>';
		}
	}else{
		// jika $is_name= true maka path diambil dengan menggunakan base_url();
		if($is_name==false)$name=$path; //jika menggunakan css dari web lain
			else $name=str_replace(DEF_FOLDER,'',base_url('_assets/css/'.$path));
		echo '<link rel="stylesheet" href='.$name.'>';
	}
}

function helper($filename){
	$CI=& get_instance();
	$CI->load->helper($filename);
}

function form_validasi($config=array()){
	$CI=& get_instance();
	$CI->load->library('form_validation');
	$CI->form_validation->set_rules($config);
	$CI->form_validation->set_message('required', cur_lang('login','error_form_required',false));
	$CI->form_validation->set_message('matches', cur_lang('login','error_form_match',false));
	if($CI->form_validation->run() == FALSE){
		return FALSE;
	}
	return TRUE;
}

?>