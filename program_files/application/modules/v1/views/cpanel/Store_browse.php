<?php
//print_r($detail_toko);
$data_categories['']='Pilih Categories';
if(isset($categories)){
	foreach ($categories as $r) {
		$data_categories[$r->ID]=$r->category_name;
	}
}
?>
<?php
if(isset($detail_toko)){
	$data_personal=array(
		'KTP'=>$detail_toko->ktp_id,
		'Nama Lengkap'=>$detail_toko->fullname,
		'Domisili'=>$detail_toko->address
		);
	$data_gen = array(
		'Nama' => $detail_toko->store_name, 
		'Tagline' => $detail_toko->store_tag_title, 
		'Url'=>site_url('site'),
		'Kategori'=>$detail_toko->category_name,
		'Alamat'=>$detail_toko->store_address,
		'Email'=>$detail_toko->email,);
	$data_kon = array(
		'No Telp 1'=>$detail_toko->no_telp_1,
		'No Telp 2'=>$detail_toko->no_telp_2,
		'BBM 1'=>$detail_toko->bbm_1,
		'BBM 2'=>$detail_toko->bbm_2,
		'Whatsapp 1'=>$detail_toko->whatsapp_1,
		'Whatsapp 2'=>$detail_toko->whatsapp_2,);
	$data_soc = array(
		'Facebook'=>$detail_toko->facebook,
		'Twitter'=>$detail_toko->twitter,
		'Gplus'=>$detail_toko->googleplus,
		'Tumblr'=>$detail_toko->tumblr,);
}
?>

<div class="row">
	
	<div class="col-md-6">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Detail Informasi Pemilik</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<?php
		    	foreach($data_personal as $key=>$value):
				     	echo '
				     	<tr>
				    		<td>'.$key.'</td>
				    		<td>'.$value.'</td>
				    	</tr>';
		    	endforeach;
		    	?>
		    </table>
		  </div>
		</div>
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Detail Informasi Toko</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<?php
		    	foreach($data_gen as $key=>$value):
				     	echo '
				     	<tr>
				    		<td>'.$key.'</td>
				    		<td>'.$value.'</td>
				    	</tr>';
		    	endforeach;
		    	?>
		    </table>
		  </div>
		</div>
	</div>

	<div class="col-md-6">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Detail Kontak Toko</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<?php
		    	foreach($data_kon as $key=>$value):
				     	echo '
				     	<tr>
				    		<td>'.$key.'</td>
				    		<td>'.$value.'</td>
				    	</tr>';
		    	endforeach;
		    	?>
		    </table>
		  </div>
		</div>
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Informasi Sosial Media</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<?php
		    	foreach($data_soc as $key=>$value):
				     	echo '
				     	<tr>
				    		<td>'.$key.'</td>
				    		<td>'.$value.'</td>
				    	</tr>';
		    	endforeach;
		    	?>
		    </table>
		  </div>
		</div>
	</div>
</div>