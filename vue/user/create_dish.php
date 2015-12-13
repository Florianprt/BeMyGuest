<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="http://localhost/Bemyguestprod/">
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
        </div>
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



    <script src="common-files/user/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
    <script src="common-files/user/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="common-files/user/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="common-files/user/js/pages/form_wizard.js"></script>
    <!-- END PAGE SCRIPT -->
    <script src="common-files/user/js/layout.js"></script>
  </body>
</html>