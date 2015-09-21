
	<div class="row" style="margin-top:30px;">
	  <div class="hidden-xs col-md-2" id="left-side" style="border-right:1px solid;height:100%">
	  	<?php 
	  		menu_default();
	  	?>
	  </div> <!-- end col-md-1 -->
	  <div class="col-md-9" style="border-right:1px solid red;">
	  	<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li><a href="#">Library</a></li>
		  <li class="active">Data</li>
		</ol>
		<span id="loader"> 
			<div class="progress" style="width:40%">
			  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%">
			    <span class="sr-only">45% Complete</span>
			  </div>
			</div>
		</span>
		<script type="text/javascript">
			$("#loader").load("<?=site_url('admin/'.$view_loader)?>");
		</script>
	  </div> <!-- end col-md-10 -->
	  <div class="hidden-xs col-md-1">
	  
	  </div> <!-- end col-md-1 -->
	</div>
<?php 

?>
<script>
	//menu
	//$('.collapse').collapse();
</script>