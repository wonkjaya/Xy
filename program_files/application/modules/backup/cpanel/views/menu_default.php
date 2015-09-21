<?php 
if(isset($actv_menu)){
  $group=$actv_menu['group'];
  $actv_menu=$actv_menu['active'];
}else{
  $group='';
  $actv_menu='';
}
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
        <span>
          Home
        </span>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse <?php if($group == 'home')echo ' in'; ?>" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php
          echo  anchor('admin/dashboard/statistics','<p class="child-menu"><i class="glyphicon glyphicon-stats"> </i> Statistik</p>').
                anchor('admin/dashboard/about_app','<p class="child-menu"><i class="glyphicon glyphicon-info-sign"> </i> Tentang App</p>');
        ?>  
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
        <span>
          Products
        </span>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse <?php if($group == 'product')echo ' in'; ?>" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php
          echo  anchor('admin/dashboard/add_product','<p class="child-menu"><i class="glyphicon glyphicon-plus"> </i> Add</p>').
                anchor('admin/dashboard/browse_product','<p class="child-menu"><i class="glyphicon glyphicon-th-list"> </i> Browse</p>').
                anchor('admin/dashboard/categories','<p class="child-menu"><i class="glyphicon glyphicon-glass"> </i> Kategori</p>');
        ?> 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <span>
          Personal
        </span>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse<?php if($group == 'personal')echo ' in'; ?>" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <?php
          echo  anchor('admin/dashboard/acc_information','<p class="child-menu"><i class="glyphicon glyphicon-user"> </i> Informasi</p>').
                anchor('admin/dashboard/acc_settings','<p class="child-menu"><i class="glyphicon glyphicon-wrench"> </i> pengaturan</p>');
        ?> 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <span>
          Toko Saya
        </span>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse<?php if($group == 'mystore')echo ' in'; ?>" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <?php
          echo  anchor('admin/dashboard/settings','<p class="child-menu"><i class="glyphicon glyphicon-wrench"> </i> Pengaturan</p>');
        ?> 
      </div>
    </div>
  </div>
</div>