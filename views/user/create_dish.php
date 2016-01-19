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

    <link href="common-files/user/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
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
            <div class="col-md-12 col-sm-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Oh Hello John,<br>thank's very much, you want to propose a cook?<br> Lot of people will be very happy ...<br>If your dish was already create you can re-post it when you click on your dish on the section See all dish </h3>
                </div>
              </div>

              <div class="panel p-20">
                <div class="wizard-div current wizard-sea">
                      <form class="wizard" data-style="sea" role="form">
                        <fieldset>
                          <legend>Basic information</legend>
                          <div class="row">
                            <div class="col-lg-6">
                              <div >
                                <h3><strong>Dish </strong> image</h3>
                                <div action="#" class="dropzone">
                                  <div class="fallback">
                                    <input name="file" type="file" multiple />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="Namedish">Name of the dish</label>
                                <input type="texte" class="form-control" placeholder="Enter name">
                              </div>
                              <div class="form-group">
                                <label for="where">Where</label>
                                <input type="texte" class="form-control" placeholder="Where ?">
                              </div>
                              <div class="form-group">
                                <label>Dish Ingredients</label>
                                <div>
                                  <input class="select-tags form-control" value="" placeholder="Ingredients ?">
                                </div>
                              </div>
                              <div class="form-group col-md-6 p-l-0">
                                <label for="dishquantity">Dish quantity</label>
                                <select class="form-control" name="quantity">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                              </div>
                              <div class="form-group col-md-6 p-r-0">
                                <label for="dishquantity">Dish price</label>
                                <div>
                                  <input class="select-tags form-control" value="" placeholder="Price ?">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="Namedish">Description of the dish</label>
                                <textarea type="name" class="form-control" placeholder="Enter name" style="height: 120px"></textarea>
                              </div>
                          </div>
                        </fieldset>
                        <fieldset>
                        <legend>Condition</legend>
                        In publishing and graphic design, lorem ipsum is common placeholder text used to demonstrate the graphic elements of a document or visual presentation, such as web pages, typography, and graphical layout. It is a form of "greeking".
                        Even though using "lorem ipsum" often arouses curiosity due to its resemblance to classical Latin, it is not intended to have meaning. Where text is visible in a document, people tend to focus on the textual content rather than upon overall presentation, so publishers use lorem ipsum when displaying a typeface or design in order to direct the focus to presentation. "Lorem ipsum" also approximates a typical distribution of letters in English.
                        <div class="radio">
                          <label>
                          <input type="radio" value="option1" name="condition" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                          Yes, it is totaly right.
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                          <input type="radio" value="option2" name="condition" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                          No, I check it twice and it is not right.
                          </label>
                        </div>
                        <div id="condition-error"></div>
                      </fieldset>
                        <fieldset>
                          <legend>Final step</legend>
                          <div class="row">
                            <div class="col-lg-12">
                              <p>
                                ICI PREVIEW DU PLAT AVANT VALIDATION
                              </p>
                            </div>
                            <noscript>
                              <input class="nocsript-finish-btn sf-right nocsript-sf-btn" type="submit"
                                name="no-js-clicked" value="finish"/>
                            </noscript>
                          </div>
                        </fieldset>
                      </form>
                    </div>
              </div>
            </div>
          </div>

          <?php include('layout/footer.php'); ?>
       