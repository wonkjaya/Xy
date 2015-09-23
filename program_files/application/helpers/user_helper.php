<?php

function session(){
	$CI=& get_instance();
	$loader=$CI->load->library('session');
	return $CI->session;
}

function get_session($item='all'){
	$sess=session();
	$sess=$sess->userdata('login');
	// jika session tidak kosong
	if ($item == 'all')return $sess; //array()
	// jika session item tidak ada
	if(!isset($sess[$item]))return '';
	// jika session item ADA 
	return $sess[$item];
}

function check_login($redir){ 
	$sess=get_session('user_email',$redir);
	if($sess=='')return '';
	if($redir==true)redirect('admin/dashboard/statistics');
	return $sess;
}

function set_session($sess_name,$data){
	$sess=session();
	$sess=$sess->set_userdata($sess_name,$data);
}

function unset_userdata($item='destroy'){
	$sess=session();
	if($item=='destroy'){
		$sess->sess_destroy();
		//print_r($sess->all_userdata());
	}
	$sess=$sess->unset_userdata($item);
}

// created from 26 juni 15
function get_sess_lang(){
	$sess=session();
	$curLang=$sess->userdata('language');
	if(empty($curLang)){
		$sess->set_userdata('language','indonesia');
	}
	return $sess->userdata('language');
}

function cur_lang($langName,$key,$print=true){
	$CI=& get_instance();
	$CI->lang->load($langName, get_sess_lang());
	if($print==false)return $CI->lang->line($key);
	echo $CI->lang->line($key);
}

// 27 juni 15
/*
 - $type = ['RG'=>'register','FP'=>'Forgot pass','NL'=>'NewsLetter',''];
 - default = FP => karna sering dipakai;
 - menggunakan helper lain (emailTemplate) sebagai template html email
 - khusus untuk admin ke user account jadi tidak perlu parameter sender;
*/
/*
	$data=[
		'receipent'=>'',
		'completeName'=>'',
		'cc'=>'',
		'bcc'=>'',
	];
*/
function send_email($data=array(),$type='FP'){ //parameter : $data = (array),$type=(string)
	$template='';
	$CI=& get_instance();
	$CI->load->helper('emailTemplate');
	
	$data['type']=$type;
	if($type=='FP'){ // forgot password recovery
		$mailer['subject'] = 'KIOS27 : '.cur_lang('login','email_subject_forgot',false); //user_helper
		$mailer['content'] = email_template($data); //emailtemplate_helper.php
		
		$sender = get_email_server_sender('FP'); //user_helper
	}elseif($type=='RG'){ // register email
		$mailer['subject'] = 'KIOS27 : '.cur_lang('login','email_subject_register',false);
		$mailer['content'] = email_template($data);	 //emailtemplate_helper.php
		
		$sender = get_email_server_sender('RG');	
	}elseif($type=='NL'){ // newsletter email
		$mailer['subject'] = 'KIOS27 : '.cur_lang('login','email_subject_newsletter',false);
		$mailer['content'] = email_template($data); //emailtemplate_helper.php
		
		$sender = get_email_server_sender('NL');
	}
	# merge array for easy access
	$mail_data=array_merge($mailer,$sender);
	//print_r($mail_data);exit;
	//send($mail_data,$data);
	
}

function send($sender,$data){
	$CI=& get_instance();
	$CI->load->library('email');
	$CI->email->from($sender['email'], $sender['name']);
	if(isset($data['receipent'])) $CI->email->to($data['receipent']);
	if(isset($data['cc'])) $CI->email->cc($data['cc']);
	if(isset($data['bcc'])) $CI->email->bcc($data['bcc']);

	$CI->email->subject('Email Test');
	$CI->email->message('Testing the email class.');
	
}

function get_email_server_sender($type='FP'){
	if($type=='FP'){ // forgot password recovery
		$email 	= 'recovery@kios27.com';
		$name 	= 'KIOS27-RECOVERY';
	}elseif($type=='RG'){ // register email
		$email 	= 'admin@kios27.com';
		$name 	= 'KIOS27-ADMIN';	
	}elseif($type=='NL'){ // newsletter email
		$email 	= 'newsletter@kios27.com';
		$name 	= 'KIOS27-NEWSLETTER';
	}else{ // other
		$email 	= '';
		$name 	= '';
	}
	return array('email'=>$email,'name'=>$name);
}


?>