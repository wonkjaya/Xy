<div class="row">
	<div class="col-md-6">
		<!--panel akun-->
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Informasi Akun</div>
		  <div class="panel-body">
		    <?php
		  	if(count($akun_data) > 0){
		  		$ktp=$akun_data->ktp_id;
		  		$email=$akun_data->user_email;
		  		$fullname=$akun_data->fullname;
		  		$address=$akun_data->domicili_address;
		  		$phonenumber=$akun_data->private_phonenumber;
		  	}

		  ?>
		    <table class="table" style="max-width:100%">
		    	<tr>
		    		<td>No KTP</td>
		    		<td >: <?=(isset($ktp))?$ktp:'none'?></td>
		    	</tr>
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
		    		<td >: <?=(isset($phonenumber))?nomor_telp_format($phonenumber):'none'//utilities helper?></td>
		    	</tr>
		    </table>
		  </div>
		</div>
		<!--end panel akun-->
		<!--panel statistic-->
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Statistik Penjualan</div>
		  <div class="panel-body">
		    <!--Konten chart-->
		  </div>
		</div>
		<!--end panel statistic-->
	</div>
	<div class="col-md-6">
		<!--panel produk-->
	  	<div class="panel panel-danger">
		  <div class="panel-heading">Log Terakhir</div>
		  <div class="panel-body">
		    <table class="table table-bordered" style="max-width:100%">
		    	<tr>
		    		<th>No</th>
		    		<th>Tanggal</th>
		    		<th>Log</th>
		    	</tr>
		    	<tr>
		    		<td colspan=3 align="center">Not Found</td>
		    	</tr>
		    </table>
		  </div>
		</div>
		<!--end panel produk-->
		<!--panel produk-->
	  	<div class="panel panel-primary">
		  <div class="panel-heading">5 Produk Terakhir</div>
		  <div class="panel-body">
		    <table class="table table-bordered" style="max-width:100%">
		    	<tr>
		    		<th>No</th>
		    		<th>Nama</th>
		    		<th>Harga</th>
		    		<th>Stok</th>
		    	</tr>
		    	<tr>
		    		<td colspan=4 align="center">Not Found</td>
		    	</tr>
		    </table>
		  </div>
		</div>
		<!--end panel produk-->
		<!--panel Penjualan-->
	  	<div class="panel panel-primary">
		  <div class="panel-heading">Penjualan Bulan Ini</div>
		  <div class="panel-body">
		    <table class="table table-bordered" style="max-width:100%">
		    	<tr>
		    		<th>No</th>
		    		<th>Nama</th>
		    		<th>Jumlah</th>
		    	</tr>
		    	<tr>
		    		<td colspan=3 align="center">Not Found</td>
		    	</tr>
		    </table>
		  </div>
		</div>
		<!--end panel penjualan-->
	</div>
</div>