<?php
# UTILITIES HELPER

function send_register_confirm($to,$message){
	$CI=& get_instance();
	$CI->load->library('email');

	$CI->email->from('email@site.com', 'admin referal');
	$CI->email->to($to);

	$CI->email->subject('Konfirmasi Pendaftaran');
	$CI->email->message($message);

	$CI->email->send();
}

function session_userdata_set($name,$val){
	$CI=& get_instance();
	$CI->load->library('session');
	$CI->session->set_userdata($name,$val);
}

function session_flashdata_set($name,$val){
	$CI=& get_instance();
	$CI->load->library('session');
	$CI->session->set_flashdata($name,$val);
}

function session_userdata_get($name){
	$CI=& get_instance();
	$CI->load->library('session');
	if(isset($_SESSION[$name])){
		return $CI->session->userdata($name);		
	}
	return '';
}

function session_flashdata_get($name){
	$CI=& get_instance();
	$CI->load->library('session');
	if(isset($_SESSION[$name])){
		return $CI->session->flashdata($name);		
	}
	return '';
}

//end of file