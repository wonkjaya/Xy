
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Daftar</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Input</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="panel panel-default" style="margin-top:20px;">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>+</th>
                </tr>
                <?php
                $no=1;
                 if(isset($categories))
                  foreach($categories as $r){
                ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$r->cat_name?></td>
                    <td>
                        <a onclick="view_data('<?= $r->ID ?>')" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open" id="view"></i></a>
                        <a onclick="edit_data('<?= $r->ID ?>')" class="btn btn-primary"><i class="glyphicon glyphicon-pencil" id="edit"></i></a>
                        <a onclick="delete_data('<?= $r->ID ?>')" class="btn btn-warning"><i class="glyphicon glyphicon-trash" id="hapus"></i></a>
                    </td>
                </tr>
                <?php
                    $no++;
                  }
                ?>
            </table>
          </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        <div role="tabpanel" class="tab-pane active" id="home">
                <div class="panel panel-default" style="margin-top:20px;">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                    <label for="cetegory_input">Nama</label>
                    <?=form_input('category_input','','class="form-control" id="cat_inp"').br()?>
                    <button class="btn btn-primary" id='submit'>Simpan</button>
                  </div>
                  <div class="panel-footer" id="error"></div>
                </div>
            </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $('#submit').on('click',function(){
    $.ajax({
      url : "<?php echo site_url('admin/add_category') ?>",
      method : "GET",
      data : {
        category_name : $('#cat_inp').val()
      }
    }).done(function($msg){
        $('#error').html($msg);
      }
    );
  })
  // edit
  function edit_data(id){
    
  }
  // delete
  function delete_data(id){
    
  }
  // view
  function view_data(id){
    
  }
</script>