<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic</a></li>
    <li role="presentation"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Info Layanan</a></li>
    <li role="presentation"><a href="#sosmed" aria-controls="sosmed" role="tab" data-toggle="tab">Sosial Media</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="basic">
     <div class="row">
      <div class="col-md-8">
        <table class="table" style="">
            <tr>
                <th colspan=3 style="border:0px;"></th>
            </tr>
            <tr border=0>
                <td colspan=3 id='feed'></td>
            </tr>
            <tr>
                <td style="width:50px;">Nama Display</td>
                <td>:</td>
                <td><?=form_input('str_disp','','id="dispname" class="form-control"')?></td>
            </tr>
            <tr>
                <td>Title Tag</td>
                <td>:</td>
                <td><?=form_input('tag_title','','id="tag_title" class="form-control"')?></td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td><?=form_input('owner','','id="owner" class="form-control"')?></td>
            </tr>
            <tr>
                <td>Kategori Toko</td>
                <td>:</td>
                <td>
                <?php
                $cat=array(''=>'Pilih');
                    if(isset($categories))
                        foreach($categories as $r){
                            $cat[$r->ID]=$r->store_cat_name;
                        }
                    echo form_dropdown('str_cat',$cat,'','id="categories" class="form-control"');
                    ?></td>
            </tr>
            <tr>
                <td colspan=3>Deskripsi</td>
            </tr>
            <tr>
                <td colspan=3>
                <?php
                    echo form_textarea('str_des','','id="desc" class="form-control"')
                ?></td>
            </tr>
            <tr>
                <td colspan=3>
                    <button class="btn btn-primary" id="submit-basic">Simpan</button>
                    <button class="btn btn-warning">Batal</button>
                </td>
            </tr>
    	</table>
      </div>
     </div>
    </div>
<script type="text/javascript">
    $('#submit-basic').on('click',function(){
        var $dispname=$('#dispname').val();
        var $tag_title=$('#tag_title').val();
        var $owner=$('#owner').val();
        var $cat=$('#categories').val();
        var $desc=$('#desc').val();
        // post to 
        $.ajax({
            url     : "<?=site_url('admin/save_settings_store/basic')?>",
            method  : "POST",
            data    : {
                dispname    : $dispname,
                tag_title   : $tag_title,
                owner       : $owner,
                categori    : $cat,
                description  : $desc 
            }
        }).done(function($res){
            $('#feed').html($res);
        });
    })
</script>

    <div role="tabpanel" class="tab-pane" id="sosmed">
     <div class="row">
      <div class="col-md-8">
    	<table class="table" style="">
    		<tr>
    			<th colspan=3 style="border:0px;"></th>
    		</tr>
    		<tr>
    			<td>Facebook</td>
    			<td>:</td>
    			<td><?php echo form_input('facebook_page','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Twitter</td>
    			<td>:</td>
    			<td><?php echo form_input('twitter_page','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Gplus</td>
    			<td>:</td>
    			<td><?php echo form_input('gplus_page','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Tumblr</td>
    			<td>:</td>
    			<td><?php echo form_input('tumblr_page','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td colspan=3>
    				<button class="btn btn-primary">Simpan</button>
    				<button class="btn btn-warning">Batal</button>
    			</td>
    		</tr>
    	</table>
      </div>
     </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="info">
     <div class="row">
      <div class="col-md-8">
    	<table class="table" style="">
    		<tr>
    			<th colspan=3 style="border:0px;"></th>
    		</tr>
    		<tr>
    			<td>Email</td>
    			<td>:</td>
    			<td><?=form_input('email_service','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Nomor Telp. 1</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Nomor Telp. 2</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Nomor Telp. 3</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Blackberry Pin</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>WhatsApp</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td colspan=3>
    				<button class="btn btn-primary">Simpan</button>
    				<button class="btn btn-warning">Batal</button>
    			</td>
    		</tr>
    	</table>
      </div>
     </div>
    </div>
  </div>

</div>