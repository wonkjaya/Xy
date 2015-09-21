<div class="container">
  <div class="col-xs-12 col-md-8">
  	<form class="form-horizontal">
  	  <div class="form-group has-feedback">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-9">
          <h1>Atur Password</h1>
        </div>
        <input type="hidden" id='id' name="id" value="<?=session_flashdata_get('id_user_conf')?>">
      </div>
  	  <div class="form-group">
  	  	<span class="col-sm-2"></span>
  	    <div class="col-sm-10" style="text-align:center;" id="feed_msg">
  	      
  	    </div>
  	  </div>
  	  <div class="form-group has-feedback">
  	    <label class="control-label col-sm-3" for="pass_set">Password</label>
  	    <div class="col-sm-9">
  	      <input type="password" class="form-control" id="pass_set" aria-describedby="inputSuccess3Status" data-toggle="tooltip" data-placement="right" title="password" trigger="focus">
  	      <span class="glyphicon glyphicon-option-horizontal form-control-feedback" aria-hidden="true" id="pass_feed"></span>
  	      <span id="inputSuccess3Status" class="sr-only">(success)</span>
  	    </div>
  	  </div>
  	  <div class="form-group has-feedback">
  	    <label class="control-label col-sm-3" for="confirm_set">Confirmation</label>
  	    <div class="col-sm-9">
  	      <input type="password" class="form-control" id="confirm_set" aria-describedby="inputSuccess3Status" data-toggle="tooltip" data-placement="right" title="konfirm" trigger="focus">
  	      <span class="glyphicon glyphicon-option-horizontal form-control-feedback" aria-hidden="true" id="confr_feed"></span>
  	      <span id="inputSuccess3Status" class="sr-only">(success)</span>
  	    </div>
  	  </div>
  	  <div class="form-group has-success has-feedback">
  	  	<label class="control-label col-sm-3" for="inputSuccess3"></label>
  	    <div class="col-sm-9">
  	      <button type="button" class="btn btn-primary" id="submit" data-loading-text="Sedang Proses...">Simpan & Lanjutkan</button>
  	    </div>
  	  </div>
  	</form>
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
              <label for="recipient-name" class="control-label">Username</label>
              <input type="text" name="username" class="form-control" id="user-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Password</label>
              <input type="password" class="form-control" name="username" id="user-pass">
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label"></label>
              <span id="">Lupa Password? <a href="#">Reset</a></span>
            </div>
          </form>
        </div>s
        <div class="modal-body" id="message-login-mdl"><?=$message?> </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup	</button>
          <button type="button" class="btn btn-primary" id="login_submit" data-loading-text="Proses...">Login</button>
        </div>
      </div>
    </div>
  </div>
<script>
// tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip('show')
});

// submit form
$('#submit').on('click', function () {
  var $btn = $(this).button('loading');
  var $id = $("#id").val();
  var $password = $("#pass_set").val();
  var $confirm = $("#confirm_set").val();
  // business logic...
  $.ajax({
  	method : "GET",
  	url : "<?=site_url($controller.'/registering_user')?>",
  	data :{
  		id : $id,
  		password : $password,
  		confirm  : $confirm
  	}
  }).done(function($res){
  	$("#feed_msg").html($res);
  	$btn.button('reset');
  	$('#username_set,#pass_set,#confirm_set').val("")
  })
})
</script>

<script>
$('#login').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.modal-title').text('Login')
})
$('#login_submit').on('click',function(){
	var $btn = $(this).button('loading');
	var $username = $('#user-name').val();
	var $password = $('#user-pass').val();

    $.ajax({
    	method : "GET",
    	url : "<?=site_url('User/login_mdl?ref=register')?>",
    	data : {
    		username : $username,
    		password : $password
    	},
    }).done(function(msg){
    	if(msg === 'sukses')document.location="<?=site_url('User/Dashboard')?>";
      $('#message-login-mdl').html(msg);
      $btn.button('reset')
    });
});

</script>
</div>