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

function nomor_telp_format($nomor){
	$tiga_1=5;
	$no=(!empty($nomor))?$nomor:'0000';
	$awalan=substr($nomor,0,4);
	$akhiran1=substr($nomor,5,4);
	$akhiran2=substr($nomor,9,3);
	$no=$awalan.'-'.$akhiran1.'-'.$akhiran2;
	return $no;
}

//end of file