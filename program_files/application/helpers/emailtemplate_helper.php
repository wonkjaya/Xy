<?php
/*
 EMAIL TEMPLATE 
 created by rohman ahmad 26 jun 15
*/

function email_template($data=array()){
	
	$type=$data['type'];
	if($type == 'FP'){
		forgot_pass_template($data);
	}
}

//27 jun 15
function forgot_pass_template($data){
	//print_r($data);
	$email=$data['receipent'];
	$name = $data['name'];
}
?>