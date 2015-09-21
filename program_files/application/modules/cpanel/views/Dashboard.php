<div class="row">
	<div class="col-md-6">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Akun Info</div>
		  <div class="panel-body">
		    <?php
		  	if(count($account_data) > 0){
		  		$email=$account_data->email_user;
		  		$fullname=$account_data->nama_lengkap;
		  		$address=$account_data->alamat;
		  		$phonenumber=$account_data->no_telp;
		  		$ref_kode=$account_data->referal_kode;
		  	}

		  ?>
		    <table class="table" style="max-width:100%">
		    	<tr>
		    		<td>Email</td>
		    		<td >: <?=(isset($email))?$email:'none'?></td>
		    	</tr>
		    	<tr>
		    		<td width="100">Nama</td>
		    		<td >: <?=(isset($fullname))?$fullname:'none'?></td>
		    	</tr>
		    	<tr>
		    		<td>Alamat</td>
		    		<td >: <?=(isset($address))?$address:'none'?></td>
		    	</tr>
		    	<tr>
		    		<td>No. Telp</td>
		    		<td >: <?=(isset($phonenumber))?$phonenumber:'none'?></td>
		    	</tr>
		    </table>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Referal Info</div>
		  <div class="panel-body">
		    <table class="table" style="max-width:100%">
		    	<tr>
		    		<td>Jumlah Ref</td>
		    		<td >: <?=(isset($count_referal))?$count_referal:'0'?></td>
		    	</tr>
		    	<tr>
		    		<td width="100">Link Referal</td>
		    		<td >: <?=(isset($ref_kode))?base_url($ref_kode):'none'?></td>
		    	</tr>
		    </table>
		  </div>
		</div>
	</div>
</div>