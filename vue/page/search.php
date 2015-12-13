<!DOCTYPE HTML>
<html >
  <head>
    <title>Be My guest | Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="common-files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="common-files/css/styles.css"/>
    <link rel="stylesheet" href="common-files/css/custom.css"/>
    <link href="common-files/plugins/magnific/magnific-popup.min.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/plugins/rateit/rateit.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link rel="stylesheet" href="common-files/plugins/owl/owl.carousel.min.css">
    <!-- END PAGE STYLE -->
  </head>
  <body>

  <?php include('vue/page/layout/header.php'); ?>

  <section>
      <!--RECHERCHE -->
      <div class="col-md-7 col-sm-7 col-xs-7" style="overflow: scroll;height: 89.5%;position: fixed;">
        <div class="row">
          <div class="col-md-12 p-t-30 p-b-20 boxshadow bg-white" style="background-color: #fff;">
            <div id="formulaire" style="color:white">
              <div class="row">
                <div class="col-md-5 m-b-10 prepend-icon">
                  <input type="text" class="form-control form-white placeholder" placeholder="Où ?">
                  <i class="line-icon-directions"></i>
                </div>
                <div class="col-md-4 m-b-10 prepend-icon">
                  <input type="text" class="form-control form-white placeholder" placeholder="Quand ?">
                  <i class="line-icon-calendar"></i>
                </div>
                <div class="col-md-3 m-b-10 prepend-icon">
                  <input type="text" class="form-control form-white placeholder" placeholder="Combiens ?">
                  <i class="line-icon-user"></i>
                </div>
              </div>
            </div>
            <div class="row m-t-20 m-b-20">
              <div class="col-md-3 col-sm-12">
                <h4 class="section-title">Fourchette de prix</h4>
              </div>
              <div class="col-md-9 col-sm-12 p-t-20">
                <input type="text" id="prixrange" name="prixrange" value="" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php for ($i=0; $i <15 ; $i++) { ?> 
          <!-- Single PLAT -->
          <div class="col-sm-6 m-t-20">
            <div class="border boxshadow">
              <div style="height: 200px">
                <div class="owl-carousel" data-plugin-options='{"autoPlay": false}' style="height:100%">
                  <div class="item">
                    <img src="common-files/images/dish/1.jpg" alt="ecommerce" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/2.jpg" alt="blog" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/3.jpg" alt="blog" class="img-responsive">
                  </div>
                </div>
              </div>
              <div class="p-20" align="center" style="position: relative">
              <a href="profil"><div class="smalliconprofil"></div></a>
              <h4 class="pricing-heading color-scheme t-left">Nom du plat</h4>
              <p class="justify">Sed a mauris sed metus feugiat congue. Proin semper velit mauris, a commodo turpis placerat vitae. Sed lorem nulla, ultrices in sem eu, luctus aliquam mi . . .</p>
              <a href="dish"  class="btn btn-purple btn-transparent">Réserver</a>
              </div>
            </div>
          </div>
          <!-- Single PLAT -->
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-md-12 m-t-40" style="background-color: #28292A; color:white;height: 60px;">
            Footer<br>
          </div>
        </div>
      </div>
      <!--RECHERCHE -->
      <!-- MAP-->
      <div class="col-md-5 col-sm-5 col-xs-5"  id="map" style="position:fixed; right: 0; left: auto; bottom: 0; top:70px;">
      <!-- MAP-->
        
      </div>
  </section>

    <script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="common-files/js/ajaxpopup.js"></script>
    <script src="common-files/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="common-files/plugins/rateit/jquery.rateit.min.js"></script>
    <script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>
    <script src="common-files/plugins/ion.rangeSlider-2.1.2/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>

    <!-- BEGIN PAGE SCRIPTS -->
  <script src="common-files/plugins/owl/owl.carousel.min.js"></script>
  <!-- END PAGE SCRIPTS -->

    <script>
    $("#prixrange").ionRangeSlider({
    type: "double",
    min: 0,
    max: 100,
    from: 10,
    to: 50,
    prefix: "€"
    });
    </script>
      <script>
  $(document).ready(function() {

  /* Image Carousel */
    $('.owl-carousel:not(.manual)').each(function() {
        var $this = $(this), opts = null,
        pluginOptions = $this.data('plugin-options'),
        defaults = {
            "autoPlay": false,
            "items": 1,
            "singleItem": true,
            "itemsDesktop" : [1199,5],
            "itemsDesktopSmall" : [980,4],
            "itemsTablet": [768,3],
            "itemsMobile" : [479,2],
            "responsive" : true,
        };
        console.log(defaults);

        opts = $.extend( {}, defaults, pluginOptions );
        $this.owlCarousel(opts); 
    });
  });
  </script>
  </body>
</html>
