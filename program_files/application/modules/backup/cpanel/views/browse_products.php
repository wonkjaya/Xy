<div class="panel panel-default">
  <div class="panel-heading">Produk Saya</div>
  <div class="panel-body">
    <table class="table table-bordered">
    	<tr>
    		<th>No</th>
    		<th>Kategori</th>
    		<th>Kode</th>
    		<th>Nama</th>
    		<th>Harga</th>
    		<th>+</th>
    	</tr>
    	<tr>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td>
    			<?php
    			 echo anchor('','<i class="glyphicon glyphicon-eye-open"></i>','class="btn btn-primary"').nbs();
    			 echo anchor('','<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary"').nbs();
    			 echo anchor('','<i class="glyphicon glyphicon-trash"></i>','class="btn btn-warning"');
    			?>
    		</td>
    	</tr>
    </table>
  </div>
</div>