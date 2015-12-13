<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="http://localhost/Bemyguestprod/">
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
          <?php if ($i=0; $i<6 ; $i++ ){ ?>
          
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


          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel panel-transparent">
                <div class="panel-content">
                  <div class="portfolioContainer grid">
                    <figure class="effect-layla">
                      <img src="common-files/user/images/gallery/4.jpg" alt="img04"/>
                      <figcaption>
                        <h2>Nom du plat</h2>
                        <a href="#">View more</a>
                      </figcaption>
                    </figure>
                    <figure class="effect-layla">
                      <img src="common-files/user/images/gallery/4.jpg" alt="img04"/>
                      <figcaption>
                        <h2>Nom du plat</h2>
                        <a href="#">View more</a>
                      </figcaption>
                    </figure>
                    <figure class="effect-layla">
                      <img src="common-files/user/images/gallery/4.jpg" alt="img04"/>
                      <figcaption>
                        <h2>Nom du plat</h2>
                        <a href="#">View more</a>
                      </figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>


          
          <?php include('layout/footer.php'); ?>
        <!-- END PAGE CONTENT -->
      <!-- END MAIN CONTENT -->

    </section>



    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="common-files/user/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="common-files/user/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="common-files/user/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="common-files/user/plugins/gsap/main-gsap.min.js"></script>
    <script src="common-files/user/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="common-files/user/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="common-files/user/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="common-files/user/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="common-files/user/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="common-files/user/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="common-files/user/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="common-files/user/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="common-files/user/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="common-files/user/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="common-files/user/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="common-files/user/js/builder.js"></script> <!-- Theme Builder -->
    <script src="common-files/user/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="common-files/user/js/application.js"></script> <!-- Main Application Script -->
    <script src="common-files/user/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="common-files/user/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="common-files/user/js/quickview.js"></script> <!-- Chat Script -->
    <script src="common-files/user/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="common-files/user/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
    <script src="common-files/user/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="common-files/user/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
    <script src="common-files/user/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="common-files/user/js/widgets/todo_list.js"></script>
    <script src="common-files/user/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <script src="common-files/user/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
    <script src="common-files/user/plugins/charts-highstock/js/highstock.min.js"></script> <!-- financial Charts -->
    <script src="common-files/user/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
    <script src="common-files/user/plugins/maps-amcharts/ammap/ammap.min.js"></script> <!-- Vector Map -->
    <script src="common-files/user/plugins/maps-amcharts/ammap/maps/js/worldLow.min.js"></script> <!-- Vector World Map  -->
    <script src="common-files/user/plugins/maps-amcharts/ammap/themes/black.min.js"></script> <!-- Vector Map Black Theme -->
    <script src="common-files/user/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
    <script src="common-files/user/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
    <script src="common-files/user/js/widgets/widget_weather.js"></script>
    <script src="common-files/user/js/pages/dashboard.js"></script>
    <!-- END PAGE SCRIPT -->
    <script src="common-files/user/js/layout.js"></script>
  </body>
</html>