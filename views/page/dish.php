<!DOCTYPE HTML>
<html>
  <head>
    <title>Be My guest | Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="common-files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="common-files/css/styles.css"/>
    <link rel="stylesheet" href="common-files/css/custom.css"/>
    <link href="common-files/plugins/magnific/magnific-popup.min.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="common-files/plugins/owl/owl.carousel.min.css">
    <link href="common-files/plugins/rateit/rateit.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <body>

  <?php include('layout/header.php'); ?>

  <section>
    <div class="container">
        <div class="row m-t-60 boxshadow bd-3" style="height:auto">
          <div class="col-md-6 col-sm-6 col-xs-12 bd-3 p-0 " style=" height:254px; overflow: hidden">
                <div class="owl-carousel" data-plugin-options='{"autoPlay": 3000}' style="height:100%">
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
          <div class="col-md-6 col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title">Le Nom du plat</h2><div class="rateit p-20" data-rateit-value="2.5" data-rateit-resetable="false" data-rateit-readonly="true"></div>
          </div>
        </div>
        <div class="row m-t-40">
          <div class="col-md-8 col-sm-8 p-0 col-sm-12 justify">
              <p class="section-title m-t-40">location : 4 quai de gesvres 75004 Paris</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur luctus sapien sed velit semper, ac lobortis libero convallis. Nam vulputate eget nibh non porta. Suspendisse pharetra venenatis suscipit. Quisque varius nisl ac purus fermentum, quis auctor sem fringilla. Mauris venenatis et mi a ullamcorper. Pellentesque faucibus ornare velit. Ut ultricies nulla vitae arcu fermentum luctus. Vivamus magna mauris, scelerisque nec aliquam quis, consectetur vitae ante. Nulla facilisi.</p>
              <a href="#"  class="btn btn-purple btn-transparent m-t-20">Voir l'intégralité des photos</a>
          </div>
          <div class="col-md-4 col-sm-4 p-0">
            <div class="row">
              <div class="col-md-10 col-md-offset-2 p-40 p-t-0">
                <div class=" row border-green boxshadow t-center p-b-20 bd-6">
                  <div class=" col-md-6 col-sm-6 col-xs-6 border-bottom p-10 m-t-0 t-left" style="background-color:#87D37C;height: 70px;">
                    <h5 class="title-note-section">5 €</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 border-bottom p-20 m-t-0" style="background-color:#87D37C; height: 70px;">
                    <p class="t-right">par plat</h5>
                  </div>
                  <div class="p-20 col-md-12 ">
                    <table class="table table-bordered">
                      <tbody>
                      <tr>
                        <td>5 € x 1 plat</td>
                        <td class="text-right">5 €</td>
                      </tr>
                      <tr>
                        <td>Frais de service<i id="service-fee-tooltip" class="icon icon-question"></i>      
                        </td>
                        <td class="text-right">0.65 €</td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td class="text-right">5.65 €</td>
                      </tr>
                      </tbody>
                    </table>
                  <a href="dish.php?id="  class="btn btn-purple btn-transparent">Procéder au payment</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container p-0">
      <div class="row ">
        <div class="col-md-6 col-sm-6 p-20 col-sm-12 justify">
          <div class="border-yellow boxshadow t-center">
            <h5 class="title-note-section border-bottom p-10">Ingrédiens</h5>
              <div class="m-t-20 m-b-40" style="overflow: hidden">
                <ul class="list-two" >
                  <?php for ($i=0; $i < 7; $i++) { ?>
                  <li>Lorem ipsum deffe fefe</li>
                  <?php } ?>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 p-20">
          <div class="border-yellow boxshadow t-center p-b-40">
            <h5 class="title-note-section border-bottom p-10">Localisation</h5>
            <p class="justify p-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur luctus sapien sed velit semper, ac lobortis libero convallis. Nam vulputate eget nibh non porta. Suspendisse pharetra venenatis suscipit. Quisque varius nisl ac purus fermentum, quis auctor sem fringilla. Mauris venenatis et mi a ullamcorper. Pellentesque faucibus ornare velit. Ut ultricies nulla vitae arcu fermentum luctus. Vivamus magna mauris, scelerisque nec aliquam quis, consectetur vitae ante. Nulla facilisi.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section  class="m-t-40" style="height: 150px; width: 100%; background-color: black"></section>
  <script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
  <script src="common-files/js/ajaxpopup.js"></script>
  <script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>
  <script src="common-files/plugins/rateit/jquery.rateit.min.js"></script> 

  <!-- BEGIN PAGE SCRIPTS -->
  <script src="common-files/plugins/owl/owl.carousel.min.js"></script>
  <!-- END PAGE SCRIPTS -->
  <script>
  $(document).ready(function() {
 
  /* Image Carousel */
    $('.owl-carousel:not(.manual)').each(function() {
        var $this = $(this), opts = null,
        pluginOptions = $this.data('plugin-options'),
        defaults = {
            "autoPlay": 3000,
            "items": 1,
            "singleItem": true,
            "itemsDesktop" : [1199,5],
            "itemsDesktopSmall" : [980,4],
            "itemsTablet": [768,3],
            "itemsMobile" : [479,2],
            "responsive" : true,

        };

        opts = $.extend( {}, defaults, pluginOptions );
        $this.owlCarousel(opts); 
    });

 
});</script>
  </body>
</html>
