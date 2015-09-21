<div class="row">
	<div class="col-md-7">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Akun Info</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<tr>
		    		<td>No</td>
		    		<td>Penawaran</td>
		    		<td>*</td>
		    	</tr>
		    <?php
		    $no=1;
		  	foreach($penawaran as $row){
		  		$ID=$row->ID;
		  		$id_website=$row->id_website;
		  		$nama_komisi=$row->nama_komisi;
		  		$status=$row->status;
		    	echo '<tr>
		    		<td>'.$no.'</td>
		    		<td>'.ucfirst($nama_komisi).'</td>
		    		<td>'.anchor('','<span class="btn btn-warning">Lihat</span>').'</td>
		    	</tr>';
		    	$no++;
		  	}

		  ?>
		    </table>
		  </div>
		</div>
	</div>
	<div class="col-md-5">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Referal Info</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<tr>
		    		<td>No</td>
		    		<td>Website</td>
		    	</tr>
		    	<?php
		    	?>
		    	<tr>
		    		<td></td>
		    		<td></td>
		    	</tr>
		    </table>
		  </div>
		</div>
	</div>
</div>