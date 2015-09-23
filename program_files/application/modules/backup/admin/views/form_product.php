<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic</a></li>
    <li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">Images</a></li>
    <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO</a></li>
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
    		<tr>
    			<td style="width:50px;">Kode Produk</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Nama Produk</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Kategori</td>
    			<td>:</td>
    			<td>
                    <?php 
                    $ctgr=array();
                     if(isset($categories)){
                        foreach($categories as $cat){
                            $ctgr[$cat->ID]=$cat->cat_name;
                        }
                     }
                     echo form_dropdown('prd_cat',$ctgr,'','class="form-control"');
                    ?>
                 </td>
    		</tr>
    		<tr>
    			<td>Harga Produk</td>
    			<td>:</td>
    			<td><?=form_input(array('type'=>"number" ,'class'=>"form-control"))?></td>
    		</tr>
    		<tr>
    			<td>Diskon Produk</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td colspan=3>Deskripsi Produk</td>
    		</tr>
    		<tr>
    			<td colspan=3><?=form_textarea('','','class="form-control"')?></td>
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
    <div role="tabpanel" class="tab-pane" id="images">
     <div class="row">
      <div class="col-md-8">
    	<table class="table" style="">
    		<tr>
    			<th colspan=3 style="border:0px;"></th>
    		</tr>
    		<tr>
    			<td>Gambar 1</td>
    			<td>:</td>
    			<td><?php echo form_upload('image1','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Gambar 2</td>
    			<td>:</td>
    			<td><?php echo form_upload('image1','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Gambar 3</td>
    			<td>:</td>
    			<td><?php echo form_upload('image1','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Gambar 4</td>
    			<td>:</td>
    			<td><?php echo form_upload('image1','','class="form-control"');?></td>
    		</tr>
    		<tr>
    			<td>Preview</td>
    			<td></td>
    			<td>
    				<?php 
    					echo img('_assets/images/uploads/example.png','','class="img-rounded" id="upload"');
    					echo img('_assets/images/uploads/example.png','','class="img-rounded" id="upload"');
    					echo img('_assets/images/uploads/example.png','','class="img-rounded" id="upload"');
    					echo img('_assets/images/uploads/example.png','','class="img-rounded" id="upload"');
    				?>
    			</td>
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
    <div role="tabpanel" class="tab-pane" id="seo">
     <div class="row">
      <div class="col-md-8">
    	<table class="table" style="">
    		<tr>
    			<th colspan=3 style="border:0px;"></th>
    		</tr>
    		<tr>
    			<td>Meta Title</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Meta Tag</td>
    			<td>:</td>
    			<td><?=form_input('','','class="form-control"')?></td>
    		</tr>
    		<tr>
    			<td>Meta Description</td>
    			<td>:</td>
    			<td><?=form_textarea('','','class="form-control"')?></td>
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