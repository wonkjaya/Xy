<?php

function qrcode(){
	require(realpath('_ext-library/phpqrcode').'/qrlib.php');
	$PNG_TEMP_DIR = realpath('_ext-library/phpqrcode').'/temp'.DIRECTORY_SEPARATOR;
	$PNG_WEB_DIR = base_url('_ext-library/phpqrcode/temp/').'/';
	//ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($errorCorrectionLevel) && in_array('L', array('L','M','Q','H')))
        $errorCorrectionLevel = "L";    

    $matrixPointSize = 4;
    if (isset($matrixPointSize))
        $matrixPointSize = min(max((int)$matrixPointSize, 1), 10);

    $data='https://www.facebook.com/profile.php?id=100008876596207';
    if (isset($data)) { 
    
        //it's very important!
        if (trim($data) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
}
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