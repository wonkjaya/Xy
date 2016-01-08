<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           <?php
            $menu=array('menusatu' => 
                          array(
                            get_link(1,'c1').'/dashboard'=>'Dashboard',
                            get_link(1,'c1').'/mystore'=>'Toko',
                            get_link(1,'p2').'/'=>'Product',
                            get_link(1,'c1').'/poin'=>'Poin',
                          ),
                       );
           ?>
           <?php
           $ac=1;
            foreach($menu as $id=>$sub):
              echo '<ul class="nav nav-sidebar" id="'.$id.'"></span>';
                foreach($sub as $url=>$label):
                  $ac_id=($ac == $menu_ac)?'active':'none';
                   echo '<li class="'.$ac_id.'">'.anchor($url,$label).'</li>';
                  $ac++;
                  endforeach;
              echo '</ul>';
             endforeach;
           ?>
          
        </div><!--/span-->

        
        
        <div class="col-sm-9 col-md-10 main" style="min-height:550px">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>

          <h1 class="page-header">
            <?php
              echo $title=(isset($title))?$title:'';
              if($title=='Store'){ 
                echo (!isset($_GET['edit']))?anchor($this->uri->uri_string().'?edit',
                            'Edit',
                            'class="btn btn-default" style="margin-left:10px;"'):'';
              }
            ?>
          </h1>