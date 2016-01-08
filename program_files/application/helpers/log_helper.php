<?php

function insert_log($data){
	$CI =& get_instance();
	$CI->load->model(version(1).'/mlog');
	$CI->mlog->insert_log($data);
}

?>