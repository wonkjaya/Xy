<?php
//print_r($detail_toko);
$data_categories['']='Pilih Categories';
if(isset($categories)){
	foreach ($categories as $r) {
		$data_categories[$r->ID]=$r->category_name;
	}
}
if(isset($detail_toko)){
	$input_0 = array(
		'' => form_hidden('ID',$detail_toko->detail_ID), 
		'No KTP' => form_input('store_name',$detail_toko->store_name), 
		'Nama Lengkap' => form_input('tagline',$detail_toko->store_tag_title), 
		'Alias'=>form_input('url',site_url('site')),
		'Alamat Asal'=>form_dropdown('category',$data_categories,$detail_toko->store_cat_ID),
		'Alamat Sekarang'=>form_input('address',$detail_toko->store_address),
	);
	$input_1 = array(
		'Nama' => form_input('store_name',$detail_toko->store_name), 
		'Tagline' => form_input('tagline',$detail_toko->store_tag_title), 
		//'Url'=>form_input('url',site_url('site')),
		'Kategori'=>form_dropdown('category',$data_categories,$detail_toko->store_cat_ID),
		'Alamat'=>form_input('address',$detail_toko->store_address),
		'Diskripsi'=>form_textarea('description',$detail_toko->store_description,'style="height:50px;"'),
	);
	$input_2=array(
		'Email'=>form_input('email',$detail_toko->email),
		'No Telp 1'=>form_input('no_telp_1',$detail_toko->no_telp_1),
		'No Telp 2'=>form_input('no_telp_2',$detail_toko->no_telp_2),
		'BBM 1'=>form_input('bbm_1',$detail_toko->bbm_1),
		'BBM 2'=>form_input('bbm_2',$detail_toko->bbm_2),
		'Whatsapp 1'=>form_input('whatsapp_1',$detail_toko->whatsapp_1),
		'Whatsapp 2'=>form_input('whatsapp_2',$detail_toko->whatsapp_2),
	);
	$input_3=array(
		'Facebook'=>form_input('fb',$detail_toko->facebook),
		'Twitter'=>form_input('twitter',$detail_toko->twitter),
		'Gplus'=>form_input('gplus',$detail_toko->googleplus),
		'Tumblr'=>form_input('tumblr',$detail_toko->tumblr)
	);
}
$url=site_url(get_link(1,'c1').'/save_form');
?>

<div class="row">
	<div class="col-md-7">
		  	<div class="panel panel-primary">
			  <div class="panel-heading">Informasi Umum</div>
			  <div class="panel-body">
			  	<?=form_open($url.'?')?>
			    <table class="table" style="max-width:100%"> 
			    	<?php
			    	 foreach($input_1 as $label=>$val):
			    	?>
			    	<tr>
			    		<td><?=$label?></td>
			    		<td><?=$val?></td>
			    	</tr>
			    	<?php
			    	 endforeach;
			    	?>
			    	<tr>
			    		<td></td>
			    		<td><button name='submit_1' class='btn btn-primary'>Simpan</button></td>
			    	</tr>
			    </table>
			    <?=form_close()?>
			  </div>
			</div>
			<div class="panel panel-primary">
			 	<div class="panel-heading">Sosial Media</div>
				<div class="panel-body">
					<?=form_open($url)?>
					    <table class="table" style="max-width:100%">
					    	<?php
					    	 foreach($input_3 as $label=>$val):
					    	?>
					    	<tr>
					    		<td><?=$label?></td>
					    		<td><?=$val?></td>
					    	</tr>
					    	<?php
					    	 endforeach;
					    	?>
					    	<tr>
					    		<td></td>
					    		<td><button name='submit_3' class='btn btn-primary'>Simpan</button></td>
					    	</tr>
					    </table>
				    <?=form_close()?>
				</div>
			</div>
	</div>
	<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">Info Service</div>
				<div class="panel-body">
					<?=form_open($url)?>
					    <table class="table" style="max-width:100%">
					    	<?php
					    	 foreach($input_2 as $label=>$val):
					    	?>
					    	<tr>
					    		<td><?=$label?></td>
					    		<td><?=$val?></td>
					    	</tr>
					    	<?php
					    	 endforeach;
					    	?>
					    	<tr>
					    		<td></td>
					    		<td><button name='submit_2' class='btn btn-primary'>Simpan</button></td>
				    	</tr>
					    </table>
					    <?=form_close()?>
				</div>
			</div>
	</div>
</div>