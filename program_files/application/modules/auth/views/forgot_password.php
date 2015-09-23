<!--Forgot MODAL-->
<div class="modal fade" id="modal_forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Forgot Password</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email</label>
            <input type="text" name="email" class="form-control" id="user_email">
          </div>
      </div>
      <div class="modal-body" id="message-reset-mdl"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="send_recovery" data-loading-text="Proses...">Lanjutkan</button>
        <a class="btn btn-warning" id="register">Register</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
//forgot password
$('#modal_forgot').modal('toggle');

// forgot submited
$('#send_recovery').on('click',function(){
  var $email=$('#user_email').val()
  $.ajax({
    method : 'GET',
    url : "forgot_pass",
    data : {
      user_email : $email
    }
  }).done(function($res){
    $('#message-reset-mdl').html($res);
  })
})

//register
$('#register').on('click',function(){
  document.location='Home'
})
</script>