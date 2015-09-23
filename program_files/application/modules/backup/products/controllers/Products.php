<?php

class Products extends CI_Controller{

	function index(){
		echo 'asd';
	}
	
	function preview($product_slug=''){ //gabungan antara id dan title_product ex : [id]_[nama_product]
		echo 'product_slug = '.$product_slug;
	}
	
	function ke2(){
		echo "function ke-2";
	}




}
?>