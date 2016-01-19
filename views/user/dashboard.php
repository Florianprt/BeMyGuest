<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="<?php echo BASE ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="common-files/user/images/favicon.png" type="image/png">
    <title>Be my guest Admin</title>
    <link href="common-files/user/css/style.css" rel="stylesheet">
    <link href="common-files/user/css/theme.css" rel="stylesheet">
    <link href="common-files/user/css/ui.css" rel="stylesheet">
    <link href="common-files/user/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/user/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
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
            <div class="col-md-8 col-sm-6 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Hi John , How are you today ? </h3>
                  <p>We hope every think is ok, are you angry? or maybe you want to cook for somebody today?</p>
                </div>
              </div>

              <div class="panel">
                <div class="panel-header">
                  <h3><i class="fa fa-table"></i>Modifications effectuée depuis le .. /.. / ..</h3>
                </div>
                <div class="panel-content">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Taches</th>
                        <th>Temps</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Changer ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Changer ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Changer ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Changer ...</td>
                        <td>1h</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6 portlets">
              <div class="panel widget-weather"></div>
              <div class="widget widget_calendar bg-dark">
                <div class="multidatepicker"></div>
              </div>
            </div>
          </div>
          <?php include('layout/footer.php'); ?>
          