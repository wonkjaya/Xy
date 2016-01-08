<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered kecil">
			<tr>
				<td colspan=7 style="text-align:right">
					<?=anchor(get_link(1,'p2').'/new_product','New','class="btn btn-default"')?>
				</td>
			</tr>
			<tr class="info">
				<th>No</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Harga Kulak</th>
				<th>Harga Jual</th>
				<th>Diskon</th>
				<th>Deskripsi</th>
			</tr>
			<?php
				if($products)
				foreach($products as $p){
					echo '<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>';
				}
			?>
		</table>
	</div>
</div>