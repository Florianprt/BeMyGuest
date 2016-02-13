
<?php if ((isset($data['pages_info']['nom']))&&($data['pages_info']['nom']!="search")) {?>
<section  class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1 p-t-30" style="height:150px">
          <img src="common-files/images/logo/logo2_gris.png" style="width:300px">
      </div>
      <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-5">
        <h4>Menu</h4>
        <p><a href="">Home</a></p>
        <p><a class="inscription" href="">Sign in</a></p>
        <p><a class="connexion" href="">Sign up</a></p>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-7">
        <h4>Company Info</h4>
        <p><a href="cgu/">C.G.U</a></p>
        <p><a href="faq/">F.A.Q</a></p>
        <p><a class="opencontact" href="#">Contact us</a></p>
      </div>
      <div class="col-md-3 col-xs-12">
        <h4>Follow us</h4>
        <p class="iconfooter">
          <a href="https://www.facebook.com/Be-My-Guest-1005277742847211/?ref=aymt_homepage_panel" target="_bank"><i class="fa fa-facebook-square"></i></a>
          <a href="https://twitter.com/BeMyGuest001" target="_bank"><i class="fa fa-twitter-square"></i></a>
          <a href="instagram...." target="_bank"><i class="fa fa-instagram"></i></a>
        </p>
      </div>
    </div>
  </div>
</section>

<?php }?>


  	<script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
  	<script src="common-files/plugins/jquery/jquery-ui.min.js"></script>
    <script src="common-files/user/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="//maps.google.com/maps/api/js?sensor=true"></script> <!-- Google Maps -->
    <script src="common-files/user/plugins/google-maps/markerclusterer.min.js"></script> <!-- Google Maps Marker Clusterer -OPTIONAL -->
    <script src="common-files/user/plugins/google-maps/gmaps.min.js"></script> <!-- Google Maps Easy -->

  	<script src="common-files/js/ajaxpopup.js"></script>
  	<script src="common-files/js/application.js"></script>
  	<script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>
  	<script src="common-files/user/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
  	<script src="common-files/plugins/rateit/jquery.rateit.min.js"></script> 
  	<script src="common-files/plugins/owl/owl.carousel.min.js"></script>

  	<!-- BEGIN PAGE SCRIPTS -->
  	<script src="common-files/js/home.js"></script>
  	<script src="common-files/plugins/vide/jquery.vide.min.js"></script>
  	<script src="common-files/plugins/select2/select2.min.js"></script>
    <script src="common-files/user/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->
    <script src="common-files/user/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->

    <script src="common-files/user/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
    <script src="common-files/user/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
    <script src="common-files/user/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="common-files/user/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="common-files/user/js/pages/form_wizard.js"></script>
    <script src="common-files/user/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="common-files/user/js/pages/form_plugins.js"></script>
    <script src="common-files/plugins/ion.rangeSlider-2.1.2/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="common-files/js/simpleCart.min.js"></script>
    <script src="common-files/js/simplecart.js"></script>
    <script src="common-files/plugins/nivo-lightbox/nivo-lightbox.min.js"></script>

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

<?php if ((isset($data['pages_info']['nom']))&&($data['pages_info']['nom']=="search")) {?>
  <script>
  $(function () {
      var map_map;
      var latbdd = <?php echo $data['search']['lat']?>;
      var longbdd =<?php echo $data['search']['long']?>;
      var markerIcon = 'common-files/markergooglemap/you.png';

      my_map = new GMaps({
          el: '#my-map',
          lat: latbdd,
          lng: longbdd,
          zoomControl: true,
          panControl: false,
          scrollwheel: false,
          streetViewControl: false,
          mapTypeControl: false,
          overviewMapControl: false
      });
      // If you want to add a marker
      my_map.addMarker({
          lat: latbdd,
          lng: longbdd,
          icon: markerIcon,
          title: 'Marker with InfoWindow',
          infoWindow: {
              content: '<h4 class="pricing-heading color-scheme t-left">You want your dish her</h4>'
          }
      });

   <?php for ($i=0; $i <count($leslat) ; $i++) {?>
      var latdish = <?php echo $leslat[$i]?>;
      var longdish =<?php echo $leslong[$i]?>;
      var name = '<?php echo $lesname[$i]?>';
      var lesid =<?php echo $lesid[$i]?>;
      var markerIcon = 'common-files/markergooglemap/food.png';
      // If you want to add a marker
      my_map.addMarker({
          lat: latdish,
          lng: longdish,
          title: 'Dish',
          icon: markerIcon,
          infoWindow: {
              content: '<div id="hover_'+lesid+'" class="maphover" ><h4 class="pricing-heading color-scheme t-left">'+name+'</h4><a href="#" class="btn btn-purple btn-transparent">Look it</a></div>'
          }
      });
  <?php }?>
      
  });
      $( ".maphover" ).hover(function() {
        var id = $(this).attr('id');
        console.log(id);
        $( "#page_"+id ).addClass( "border-orange" );
    });
  </script>
<?php }?>
<?php if ((isset($data['pages_info']['nom']))&&($data['pages_info']['nom']=="dish")) {?>
  <script>
  $(function () {
      var map_map;
      var latbdd = <?php echo $data['dish']['lat']?>;
      var longbdd =<?php echo $data['dish']['long']?>;
      var markerIcon = 'common-files/markergooglemap/food.png';

      my_map = new GMaps({
          el: '#my-map',
          lat: latbdd,
          lng: longbdd,
          zoomControl: true,
          panControl: false,
          scrollwheel: false,
          streetViewControl: false,
          mapTypeControl: false,
          overviewMapControl: false
      });
      // If you want to add a marker
      my_map.addMarker({
          lat: latbdd,
          lng: longbdd,
          title: 'Marker with InfoWindow',
          icon: markerIcon,
          infoWindow: {
              content: '<h4 class="pricing-heading color-scheme t-left">The dish awaits you here!</h4>'
          }
      });
      
  });
  </script>
<?php }?>

  <script>
      $( "#nearhereinside" ).click(function() {
        $("#btnsearch").attr({"disabled":"true","value":"Envoi..."});
        $('#gifgeoloc').fadeIn();
        if (navigator.geolocation)
        {
          navigator.geolocation.getCurrentPosition(function(position)
          { 
            $( "#lat" ).val( position.coords.latitude );
            $( "#lng" ).val( position.coords.longitude );
            $('#btnsearch').removeAttr("disabled");
            $('#gifgeoloc').attr('src','common-files/images/done.png');
            //alert("Latitude : " + position.coords.latitude + ", longitude : " + position.coords.longitude);
          });
        }
        else
          alert("The geolocalisation doesn't work with your devices sorry, but enter an adress!");
      });
  </script>

<?php if ((isset($data['pages_info']['nom']))&&($data['pages_info']['nom']=="payment")) {?>

  <script>
    $( window ).load(function() {
      $( "#thequantityfinal" ).text(simpleCart.quantity());
      $( "#changenewpricefinal" ).text(simpleCart.quantity()*$("#dishpricepaymentfinal").text());
      $( "#servicefeespricefinal" ).text(simpleCart.tax().toFixed(2));
      $( "#pricetotalfinal" ).text(simpleCart.grandTotal());

      modifyPagePayment();
    });


  </script>
<?php }else{ ?>
<script>
  simpleCart.empty();
</script>
<?php }?>


  </body>
</html>



