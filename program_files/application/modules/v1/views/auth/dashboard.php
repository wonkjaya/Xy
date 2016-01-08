<div class="col-md-1 hidden-xs"></div> <!-- untuk ukuran hp otomatis terhidden-->
<div class="col-md-10" style="">
	<div class="panel panel-primary">
	  <div class="panel-heading">Akun Info</div>
	  <div class="panel-body">
	  <?php
	  	if(count($message) > 0){
	  		$email=$message['account_data']->username;
	  		$fullname=$message['account_data']->full_name;
	  		$address=$message['account_data']->address;
	  		$phonenumber=$message['account_data']->phone_number;
	  	}

	  ?>
	    <table class="table" style="max-width:100%">
	    	<tr>
	    		<td>Username</td>
	    		<td >: <?=($username))?$username:'none'?></td>
	    	</tr>
	    	<tr>
	    		<td width="100">Nama</td>
	    		<td >: <?=$full_name?></td>
	    	</tr>
	    	<tr>
	    		<td>Email</td>
	    		<td  style="overflow:hidden">: <?=$email?></td>
	    	</tr>
	    	<tr>
	    		<td>Alamat</td>
	    		<td >: <?=$address?></td>
	    	</tr>
	    	<tr>
	    		<td>No. Telp</td>
	    		<td >: <?=$phonenumber?></td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="panel panel-warning">
	  <div class="panel-heading">
	    <h3 class="panel-title">Referal Link Anda (Tersedia)</h3>
	  </div>
	  <div class="panel-body" style="color:#8a6d3b">
	    <?php 
	    	echo site_url($message['account_data']->reference_code);
	    ?>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Total Referal Berhasil</h3>
	  </div>
	  <div class="panel-body">
	  	<table class="table">
	  		<tr>
	  			<td>Jumlah Referal</td>
	  			<td><?=$message['ref']['count_referal']  ?></td>
	  		</tr>
	  		<tr>
	  			<td>Referal Ditukarkan</td>
	  			<td><?php echo $message['ref']['count_referal']; ?></td>
	  		</tr>
	  	</table>
	    
	  </div>
	</div>
</div>
<div class="col-md-1 hidden-xs"></div><!-- untuk ukuran hp otomatis terhidden-->