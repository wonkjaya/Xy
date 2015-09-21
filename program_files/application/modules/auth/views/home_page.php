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
				             		if($message !== true){
				             			echo $message;
				             		}
				             	?>
				             </div>
				             <div class="form-group">
				                 <label for="InputName">Nama Lengkap</label>
				                     <input name="fullName" type="text" class="form-control" id="InputName" placeholder="Nama Lengkap" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Alamat Email</label>
				                     <input name="Email" type="email" class="form-control" id="InputEmailFirst" placeholder="Alamat Email" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Konfirmasi Email</label>
				                     <input name="reEmail" type="email" class="form-control" id="InputEmailSecond" placeholder="Konfirmasi Email" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Alamat Lengkap</label>
				                     <input name="address" type="text" class="form-control" id="InputEmailSecond" placeholder="Alamat Lengkap" required>
				             </div>
				             <div class="form-group">
				                 <label for="InputEmail">Nomor Ponsel</label>
				                     <input name="phoneNumber" type="text" class="form-control" id="InputEmailSecond" placeholder="Nomor Ponsel" required>
				             </div>
				             <!--div class="form-group">
				                 <label for="InputMessage">Masukkan Kode</label>
				                 <div class="input-group">
				                     
				                 </div>
				             </div-->
				             <input type="submit" value="Daftar" class="btn btn-primary pull-right" style="margin-left:20px;">
				             <input type="button" id="login" value="Login" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal_login">
				         </div>
				     </form>
				</div>
		</div>
		<!-- Registration form - END -->
	</div>
</div>
