<div class="row">
	<div class="col-md-12">

	</div>
</div>
<!--end of form-->
<div class="row">
	<div class="col-md-8">
		<table class="table table-bordered">
			<tr>
				<th width="30px">No</th>
				<th>Nama Kategori</th>
				<th width="120px">*</th>
			</tr>
			<?php
			$no=1;
			if($categories):
				foreach ($categories->result() as $cat) {
					?>
						<tr>
							<td><?=$no?></td>
							<td id="cat-<?=$cat->ID?>"><?=$cat->category_name?></td>
							<td>
								<a href="#edit" class="btn btn-default glyphicon glyphicon-edit" data-id="<?=$cat->ID?>" data-value="<?=$cat->category_name?>" data-toggle="modal" data-target="#editModal"></a>
								<a href="#delete" class="btn btn-danger glyphicon glyphicon-remove" data-id="<?=$cat->ID?>" data-toggle="modal" data-target="#deleteModal"></a>
							</td>
						</tr>
					<?php
					$no++;
				}
			endif;
			?>
		</table>
	</div>
	<div class="col-md-4"></div>
</div>

<!-- Modal -->
<div class="modal bs-example-modal-sm" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
      </div>
      <div class="modal-body">
        <input id="category_id" class="form-control" type="hidden">
        <input id="category_name" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitForm">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal bs-example-modal-sm" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
      </div>
      <div class="modal-body">
        Yakin Hapus?<input id="category_id" class="form-control" type="hidden">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete">Hapus</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$('#editModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var value = button.data('value') // Extract info from data-* attributes
	  var id = button.data('id') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-body #category_name').val(value)
	  modal.find('.modal-body #category_id').val(id)
	})

	$('#submitForm').on('click',function(){
		var id=$('#category_id').val();
		var name=$('#category_name').val();
	  $.ajax({
			url:"<?=site_url(get_link(1,'p2').'/categories?save')?>",
			method:'GET',
			data:{
				ID:id,
				category_name:name
			}
		}).done(function(){
			$('#cat-'+id).html(name)
		})
	})

	$('#deleteModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var id = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body #category_id').val(id)
	})

	$('#delete').on('click',function(){
		var id=$('#category_id').val();
		var name=$('#category_name').val();
	  $.ajax({
			url:"<?=site_url(get_link(1,'p2').'/categories?delete')?>",
			method:'GET',
			data:{
				ID:id,
			}
		}).done(function(){
			$('#cat-'+id).html(name)
		})
	})
</script>