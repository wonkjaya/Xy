<style type="text/css">
	.list-group{
		width: 150px;
		float:left;
		margin:3px;
	}
</style>
<div class="container">

	<div class="page-header">
		 <h2>Daftar Toko</h2>
	</div>

	<!-- Registration form - START -->
	<div class="container">
		 <div class="row">
		     <?php
		     	if($store_list){
		     		foreach($store_list as $r){
		     			echo $r->ID;
		     		}
		     	}
		     	for($a=1;$a<=10;$a++){
		     		echo '
		     			<div class="list-group">
						  <a href="#" class="list-group-item">
						  	'.img('_assets/images/icon/tumblr.png','style="margin-left:30px"').'
						  </a>
						  <a href="#" class="list-group-item">Vestibulum at eros</a>
						</div>
		     		';
		     	}
		     ?>
		 </div>
	</div>
	<!-- Registration form - END -->

</div>
