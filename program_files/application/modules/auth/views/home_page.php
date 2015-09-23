<div class="container">

	<div class="page-header">
		 <h1>Pendaftaran Akun</h1>
	</div>
	<div class="container">
		<div class="col-md-7">
		</div>
		<div class="col-md-4">
			<!-- Registration form - START -->
				 <div class="row">
				     <form role="form" method="POST" id="registrasiForm">
				         <div class="col-lg-12">
				             <div id="message">
				             	<?php
				             		if(!is_array($message) and !empty($message)){
				             			echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
				             		}else{
				             			echo $message['msg'];
				             		}
				             	?>
				             </div>
				             <div class="form-group">
				                 <label for="InputName">Nama Lengkap</label>
				                     <input name="fullName" type="text" value="<?=(is_array($message))?$message['fullName']:''?>" class="form-control" id="InputName" placeholder="Nama Lengkap" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Alamat Email</label>
				                     <input name="Email" type="email" value="<?=(is_array($message))?$message['email']:''?>" class="form-control" id="InputEmailFirst" placeholder="Alamat Email" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Konfirmasi Email</label>
				                     <input name="reEmail" type="email" value="<?=(is_array($message))?$message['reEmail']:''?>" class="form-control" id="InputEmailSecond" placeholder="Konfirmasi Email" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Alamat Lengkap</label>
				                     <input name="address" type="text" value="<?=(is_array($message))?$message['address']:''?>" class="form-control" id="InputEmailSecond" placeholder="Alamat Lengkap" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Nomor Ponsel</label>
				                     <input name="phoneNumber" type="text" value="<?=(is_array($message))?$message['phoneNumber']:''?>" class="form-control" id="InputEmailSecond" placeholder="Nomor Ponsel" required>
				             </div>
				             <!--div class="form-group">
				                 <label for="InputMessage">Masukkan Kode</label>
				                 <div class="input-group">
				                     
				                 </div>
				             </div-->
				             <input type="submit" value="Daftar" class="btn btn-primary pull-right" style="margin-left:20px;">
				             <a href="<?=base_url('Auth/login')?>" class="btn btn-info pull-right">Login</a>
				         </div>
				     </form>
				</div>
		</div>
		<!-- Registration form - END -->
	</div>
</div>
