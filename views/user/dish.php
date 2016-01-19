<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="<?php echo BASE ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="common-files/user/images/favicon.png" type="image/png">
    <title>Le Collectif Web Admin</title>
    <link href="common-files/user/css/style.css" rel="stylesheet">
    <link href="common-files/user/css/theme.css" rel="stylesheet">
    <link href="common-files/user/css/ui.css" rel="stylesheet">
    <link href="common-files/user/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/user/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">



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
      
      <!-- Debut haut de la page header en blanc -->
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Hi John , How are you today ? </h3>
                  <p>We hope every think is ok, are you angry? or maybe you want to cook for somebody today?</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
          <?php for($i=0; $i<6 ; $i++ ) { ?>
          
            <div class="col-md-4">
              <div class="panel">
                <figure class="effect-sarah" style="overflow:hidden; height: 200px">
                  <img src="common-files/user/images/gallery/4.jpg" alt="img04"/>
                </figure>
                <div class="panel-content">
                   <h2 class="m-t-0">Burger fait maison</h2>
                </div>
                <div class="panel-footer clearfix">
                  <div class="pull-right">
                    <button type="button" class="btn btn-white m-r-10">Modifier</button>
                    <button type="button" class="btn btn-success">Le reproposer</button>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          
          <?php include('layout/footer.php'); ?>
