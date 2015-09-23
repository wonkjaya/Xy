
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Info Umum</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="panel panel-default" style="margin-top:20px;width:70%">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <center><?=img('_assets/images/uploads/profiles/example.jpg','','style="width:200px;margin:auto;" class="img img-circle"')?></center>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: </td>
                </tr>
            </table>
          </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        <div role="tabpanel" class="tab-pane active" id="home">
                <div class="panel panel-default" style="margin-top:20px;">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                  <form id="form_about">
                    <label for="id_card_input">Nomor Kartu Pengenal (KTP/SIM/Pasport)</label>
                    <?=form_input('id_card_input','','class="form-control"').br()?>
                    <label for="name_input">Nama</label>
                    <?=form_input('name_input','','class="form-control"').br()?>
                    <label for="address_in_card_input">Alamat Sesuai Pengenal</label>
                    <?=form_input('address_on_card_input','','class="form-control"').br()?>
                    <label for="address_now_input">Alamat Domisili</label>
                    <?=form_input('address_now_input','','class="form-control"').br()?>
                    <label for="gender_input">Jenis Kelamin</label>
                    <?=form_input('gender_input','','class="form-control"').br()?>
                    <label for="status_input">Status</label>
                    <?=form_input('status_input','','class="form-control"').br()?>
                    <button class="btn btn-primary" id="submit">Simpan</button>
                  </form>
                  </div>
                </div>
            </div>
            <script type="text/javascript">
            $('#submit').on('click',function(){
              var $datastring = $("#form_about").serialize();
              $.ajax({
                url : "<?=site_url('admin/edit_profile')?>",
                method : "GET",
                data : $datastring
              }).done(function($res){
                  alert($res);
                }
              );
            })
            </script>
    </div>
  </div>

</div>
<?php
print_r(get_session());
?>