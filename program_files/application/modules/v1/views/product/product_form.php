<div class="row">
	<div class="col-md-8" style="text-align:center">
			Progress Kelengkapan<br/>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
		    86%
		  </div>
		</div>
	</div>
	<div class="col-md-4" style="text-align:right">
		<div class="btn-group" role="group" aria-label="...">
			<?=anchor(get_link(1,'p2'),'<i class="glyphicon glyphicon-plus-sign"></i> Browse','class="btn btn-warning"')?>
			<?=anchor(get_link(1,'p2').'/categories','<i class="glyphicon glyphicon-plus-sign"></i> Kategori','class="btn btn-primary"')?>
		</div>
	</div>
</div>
<br/>
<?php
if(isset($edit)){

}
// CATEGORIES
$cat=array('0'=>'Pilih Kategori');
if(!empty($categories))
	foreach($categories as $r){
		$cat[$r->ID]=$r->category_name;
		//echo $r->ID;
	}
else
	$categories['']='Tidak Ada Kategori';

$harga_kulak='
	<div class="input-group">
      <div class="input-group-addon">Rp</div>'.
      form_input('prd_price_buy',(isset($prd_price_buy)?$prd_price_buy:''),'class="form-control"').'
    </div>';
$harga_jual='
	<div class="input-group">
      <div class="input-group-addon">Rp</div>'.
      form_input('prd_price_sell',(isset($prd_price_sell)?$prd_price_sell:''),'class="form-control"').'
    </div>';
$discount='
	<div class="input-group">'.
      form_input('prd_discount',(isset($prd_discount)?$prd_discount:''),'class="form-control"').'
      <div class="input-group-addon">%</div>
    </div>';
$metaTag='
	<div class="input-group">'.
      form_input('meta_tag',(isset($meta_name)?$meta_tag:''),'class="form-control"').'
      <div class="input-group-addon" title="Pisahkan dengan tanda \',\'(koma)">?</div>
    </div>';
$product=
	array(
//		'LABEL'=>'FORM ELEMENT',
		'Kode Produk'=>form_input('prd_code',(isset($prd_code)?'':''),'class="form-control"'),
		'Kategori '=>form_dropdown('prd_category',$cat,(isset($prd_category)?'':''),'class="form-control"'),
		'Nama Produk'=>form_input('prd_name',(isset($prd_name)?'':''),'class="form-control"'),
		'Harga Kulak'=>$harga_kulak,
		'Harga Jual'=>$harga_jual,
		'Diskon'=>$discount,
		'Deskripsi'=>form_textarea('prd_description',(isset($prd_description)?'':''),'class="form-control"'),
	);

$meta_product=
	array(
//		'LABEL'=>'FORM ELEMENT',
		'Nama'=>form_input('meta_name',(isset($meta_name)?$meta_name:''),'class="form-control"'),
		'Tag'=>$metaTag,
		'Deskripsi'=>form_textarea('meta_description',(isset($meta_description)?$meta_description:''),'class="form-control" maxlength="60"'),
	);

$images_product=
	array(
//		'LABEL'=>'FORM ELEMENT',
		'Image1'=>'<img class="img-thumbnail" src="'.(isset($image1)?$image1:base_url('_assets/images/noimage.png')).'" width="50px">',
		'Image2'=>'<img class="img-thumbnail" src="'.(isset($image2)?$image2:base_url('_assets/images/noimage.png')).'" width="50px">',
		'Image3'=>'<img class="img-thumbnail" src="'.(isset($image3)?$image3:base_url('_assets/images/noimage.png')).'" width="50px">',
		'Image4'=>'<img class="img-thumbnail" src="'.(isset($image4)?$image4:base_url('_assets/images/noimage.png')).'" width="50px">',
	);

?>
<?=form_open($this->uri->uri_string(),'id="form"')?>
<div class="row">
	<div class="col-md-6">
		<table class="table">
				<tr>
					<th class="text-bold" colspan=3>Informasi Umum</th>
				</tr>
				<?php
			foreach($product as $label=>$form){
				if($label == 'Deskripsi'){
					?>
					<tr>
						<td class="text-bold" colspan=3><?=$label?></td>
					</tr>
					<tr>
						<td colspan=3><?=$form?></td>
					</tr>
					<?php
				}else{
					?>
					<tr>
						<td class="text-bold"><?=$label?></td>
						<td>:</td>
						<td><?=$form?></td>
					</tr>
					<?php
				}
			}
				?>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
				<tr>
					<th class="text-bold" colspan=3>Meta SEO</th>
				</tr>
				<?php
			foreach($meta_product as $label=>$form){
				?>
				<tr>
					<td class="text-bold"><?=$label?></td>
					<td>:</td>
					<td><?=$form?></td>
				</tr>
				<?php
			}
				?>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
				<tr>
					<th class="text-bold" colspan=4>Images Product</th>
				</tr>
				<tr>
					<?php
				foreach($images_product as $label=>$form){
					echo '<td>'.$form.'</td>';
				}
					?>
				</tr>
		</table>
	</div>
	<div class="col-md-6" style="text-align:right">
	<hr/>
		<a href="<?=site_url(get_link(1,'p2'))?>" class="btn btn-warning">Batal</a>
		<a href="#submit" onclick="$('#form').submit();" class="btn btn-primary">Simpan</a>
	</div>
</div>

<?=form_open()?>
		