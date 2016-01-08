<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?=$title?></title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo base_url('_assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url('_assets/css/styles.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('_assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('_assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('_assets/js/scripts.js') ?>"></script>
    </head>
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php get_logo_web(); ?><b></b></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                <?php
                    $data_menu=array(
                        get_link()=>'Home',
                        get_link(1,'p1').'/store_list'=>'Store',
                        get_link(1,'p1').'/aboutus'=>'Tentang Kami',
                        get_link(1,'a2').'/login'=>'Login'
                        );
                ?>
                <?php
                $n=1;
                $ac_menu=(isset($ac_menu))?$ac_menu:1;
                    foreach($data_menu as $url=>$label):
                        $ac=($n==$ac_menu)?'active':'none';
                        echo '<li class="'.$ac.'">'.anchor($url,$label).'</li>';
                    $n++;
                    endforeach;
                ?>
                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li-->
                </ul>
            </div>
        </div>
    </header>

