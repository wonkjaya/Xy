<?php
$url=site_url($this->uri->uri_string());
?>

<div class="row">
	<div class="col-md-7">
		  	<div class="panel panel-primary">
			  <div class="panel-heading">Ubah Password</div>
			  <div class="panel-body">
			  	<?=form_open($url)?>
			    <table class="table" style="max-width:100%"> 
			    	<tr>
			    		<td>Password Baru</td>
			    		<td><?=form_password('new_pass')?></td>
			    	</tr>
			    	<tr>
			    		<td>Password Konfirmasi</td>
			    		<td><?=form_password('conf_pass')?></td>
			    	</tr>
			    	<tr>
			    		<td></td>
			    		<td><button name='submit_1' class='btn btn-primary'>Simpan</button></td>
			    	</tr>
			    </table>
			    <?=form_close()?>
			  </div>
			</div>
	</div>
</div>