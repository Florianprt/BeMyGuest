<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="<?php echo BASE ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="common-files/user/images/favicon.png" type="image/png">
    <title><?php echo $data['pages_info']['title'] ?></title>
    <link href="common-files/user/css/style.css" rel="stylesheet">
    <link href="common-files/user/css/theme.css" rel="stylesheet">
    <link href="common-files/user/css/ui.css" rel="stylesheet">
    <link href="common-files/user/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/user/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">

    <link href="common-files/user/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/hover-effects/hover-effects.min.css" rel="stylesheet">

    <!-- END PAGE STYLE -->

    <script src="common-files/user/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <!-- BEGIN BODY -->
  <body class="sidebar-top fixed-topbar fixed-sidebar theme-sdtl color-default dashboard">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>

    <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="home" style="background-size: contain"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
            <li class="<?php if((isset($dashboard))&&($dashboard == 1)){ ?>nav-active active<?php } ?> nav-parent"><a href="user/"><i class="icon-home"></i><span>Dashboard</span></a></li>
            <li class="nav-parent <?php if((isset($dish))&&($dish == 1)){ ?>nav-active active<?php } ?>">
              <a><i class="icons-food-11"></i><span>The Dish </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="user/createdish/">Create a dish</a></li>
                <li><a href="user/dish/">See your dish</a></li>
              </ul>
            </li>
            <li class="nav-parent">
              <a href=""><i class="icon-bubble"></i><span>Messages </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="page.php">See</a></li>
              </ul>
            </li>
            <li class="nav-parent">
              <a href=""><i class="icon-bag"></i><span>Reservations </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="page.php">Look</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if((isset($profil))&&($profil == 1)){ ?>nav-active active<?php } ?>">
              <a><i class="icon-user"></i><span>Your account</span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="user/profil/">Profile information</a></li>
                <li><a href="user/account/">Account</a></li>
              </ul>
            </li>
          </ul>
          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="#" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
    
  <!-- Debut haut de la page header en blanc -->
    <?php include('header.php'); ?>
  <!-- Fin haut de la page header en blanc -->