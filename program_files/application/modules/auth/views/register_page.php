<div class="container">

	<div class="page-header">
		 <h1>Pendaftaran Akun</h1>
	</div>

	<!-- Registration form - START -->
	<div class="container">
		 <div class="row">
		     <form role="form" method="POST" id="registrasiForm">
		         <div class="col-lg-6">
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

<!--LOGIN MODAL-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email</label>
            <input type="text" name="email" class="form-control" id="user-email">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Password</label>
            <input type="password" class="form-control" name="password" id="user-pass"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label"></label>
            <span id="">Lupa Password? <a href="<?php echo site_url($controller.'/forgot_pass') ?>" >Reset</a></span>
          </div>
        </form>
      </div>
      <div class="modal-body" id="message-login-mdl"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup	</button>
        <button type="button" class="btn btn-primary" id="login_submit" data-loading-text="Proses...">Login</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
//login form
$('#login').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.modal-title').text('Login')
})
$('#login_submit').on('click',function(){
	var $btn = $(this).button('loading');
	var $email = $('#user-email').val();
	var $password = $('#user-pass').val();

    $.ajax({
    	method : "GET",
    	url : "<?=site_url($controller.'/login_mdl?ref=register')?>",
    	data : {
    		email : $email,
    		password : $password
    	},
    }).done(function(msg){
    	if(msg === 'sukses')document.location="<?=site_url('cpanel')?>";
    	$('#message-login-mdl').html(msg);
    	$btn.button('reset')
    });
});

</script>
