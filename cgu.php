  <!DOCTYPE HTML>
<html>
  <head>
    <title><?php echo $data['pages_info']['title'] ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="common-files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="common-files/css/styles.css"/>
    <link rel="stylesheet" href="common-files/css/custom.css"/>
    <link href="common-files/plugins/magnific/magnific-popup.min.css" rel="stylesheet">
    <link href="common-files/user/plugins/dropzone/dropzone.min.css" rel="stylesheet">


    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/plugins/select2/select2.css" rel="stylesheet">
    <link href="common-files/plugins/rateit/rateit.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link rel="stylesheet" href="common-files/plugins/owl/owl.carousel.min.css">
    <link href="common-files/user/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <body>
  <script src="common-files/js/facebookconnect.js"></script>


<nav class="topnav fixed-topnav <?php if((isset($data['pages_info']['num']))&&($data['pages_info']['num']==1)){ echo 'transparent';} else{ echo 'no-transparent';}?> topnav-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand m-t-10" href="home"></a>
    </div>

    <?php if (!isset($_COOKIE['log'])) {?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="headernoconnect" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="propose"><div class="border-yellow  p-l-20 p-r-20 p-10">let's get cooking</div></a></li>
        <li class="help"><a href="#">Help</a></li>
        <li class="inscription"><a href="#">Sign up</a></li>
        <li class="connexion"><a href="#">Sign in</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->



    <!-- Collect the nav links, forms, and other content for toggling -->
    <div  id="headerajaxconnect" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="display: none !important">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="user/createdish/"><div class="border-yellow  p-l-20 p-r-20 p-10">let's get cooking !</div></a></li>
        <li class="help"><a href="#">Help</a></li>

        <!-- BEGIN USER DROPDOWN -->
        <li class="dropdown" id="user-header">
          <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img src="common-files/images/people/1.jpg" alt="user image">
          <span id="changeusername" class="username">Hi, John Doe</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="user/"><i class="icon-user"></i><span>My Profile</span></a>
            </li>
            <li>
              <a href="user/dish/"><i class="icon-calendar"></i><span>My Dish</span></a>
            </li>
            <li>
              <a href="user/profil/"><i class="icon-settings"></i><span>Account Settings</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-bubbles" ></i><span>My Message</span></a>
            </li>
            <li>
              <a href="javascript:finishconnexion('page');"><i class="icon-logout" ></i><span>Logout</span></a>
            </li>
          </ul>
        </li>
        <!-- END USER DROPDOWN -->
      </ul>
    </div><!-- /.navbar-collapse -->



    <?php }else { ?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="user/createdish/"><div class="border-yellow  p-l-20 p-r-20 p-10">let's get cooking !</div></a></li>
        <li class="help"><a href="#">Help</a></li>

        <!-- BEGIN USER DROPDOWN -->
        <li class="dropdown" id="user-header">
          <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img class="border-purple" src="<?php echo $data['personnal_information']['image']?>" alt="user image">
          <span class="username">Hi, <?php echo $data['personnal_information']['name'].' '.$data['personnal_information']['first_name']?></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="user/"><i class="icon-user"></i><span>My Profile</span></a>
            </li>
            <li>
              <a href="user/dish/"><i class="icon-calendar"></i><span>My Dish</span></a>
            </li>
            <li>
              <a href="user/profil/"><i class="icon-settings"></i><span>Account Settings</span></a>
            </li>
            <li>
              <a href="#"><i class="icon-bubbles" ></i><span>My Message</span></a>
            </li>
            <li>
              <a href="javascript:finishconnexion('page');"><i class="icon-logout" ></i><span>Logout</span></a>
            </li>
          </ul>
        </li>
        <!-- END USER DROPDOWN -->
      </ul>
    </div><!-- /.navbar-collapse -->
    
    <?php } ?>


  </div><!-- /.container-fluid -->
</nav>




<!--<fb:login-button id="logfb" scope="public_profile,email" onlogin="checkLoginState();">se conecter
</fb:login-button>-->
<div id="decofb" style="display:none"><button onclick="Logout();">se deco</button></div>
<div id="status">
</div>

  <section>
    <div class="container">
      <br/>
      <h2 class="section-title t-center">Basics for Handling Food Safely</h2>
      <div class="row bd-3" style="height:auto">
      <div class="col-md-12 col-sm-12 p-20 p-b-0 col-sm-12 justify">
        <div class="border-yellow bg-white boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 c-orange">Storage</h5>
            <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li>Always refrigerate perishable food within 2 hours—1 hour when the temperature is above 90 °F (32.2 ºC).</li>
                <li>The refrigerator should be at 40 °F (4.4 ºC) or below and the freezer at 0 °F (-17.7 ºC) or below.</li>
                <li>Cook or freeze fresh poultry, fish, ground meats, and variety meats within 2 days; other beef, veal, lamb, or pork, within 3 to 5 days.</li>
                <li>Perishable food such as meat and poultry should be wrapped securely to maintain quality and to prevent meat juices from getting onto other food.</li>
                <li>To maintain quality when freezing meat and poultry in its original package, wrap the package again with foil or plastic wrap that is recommended for the freezer.</li>
                <li>Canned foods are safe indefinitely as long as they are not exposed to freezing temperatures, or temperatures above 90 °F. If the cans look ok, they are safe to use. Discard cans that are dented, rusted, or swollen. </li>
                <li>High-acid canned food (tomatoes, fruits) will keep their best quality for 12 to 18 months; low-acid canned food (meats, vegetables) for 2 to 5 years..</li>
              </ul>
            </div>
          <h5 class="title-note-section border-bottom p-10 c-orange">Shopping</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li>Purchase refrigerated or frozen items after selecting your non-perishables.</li>
                <li>Never choose meat or poultry in packaging that is torn or leaking..</li>
                <li>Do not buy food past "Sell-By," "Use-By," or other expiration dates</li>
              </ul>
            </div>
            <h5 class="title-note-section border-bottom p-10 c-orange">Preparation</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li>Always wash hands with warm water and soap for 20 seconds before and after handling food.</li>
                <li>Don't cross-contaminate. Keep raw meat, poultry, fish, and their juices away from other food. After cutting raw meats, wash cutting board, utensils, and countertops with hot, soapy water.</li>
                <li>Cutting boards, utensils, and countertops can be sanitized by using a solution of 1 tablespoon of unscented, liquid chlorine bleach in 1 gallon of water.
</li>
                <li>Marinate meat and poultry in a covered dish in the refrigerator.</li>
              </ul>
            </div>
            <h5 class="title-note-section border-bottom p-10 c-orange">Thawing</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li><strong>Refrigerator:</strong> The refrigerator allows slow, safe thawing. Make sure thawing meat and poultry juices do not drip onto other food.</li>
                <li><strong>Cold Water:</strong> For faster thawing, place food in a leak-proof plastic bag. Submerge in cold tap water. Change the water every 30 minutes. Cook immediately after thawing.</li>
                <li><strong>Microwave:</strong> Cook meat and poultry immediately after microwave thawing.</li>
              </ul>
            </div>
            <h5 class="title-note-section border-bottom p-10 c-orange">Cooking</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-one t-grey" >
                <li style="text-align: justify;">Cook all raw beef, pork, lamb and veal steaks, chops, and roasts to a minimum internal temperature of 145 °F (62.8 ºC) as measured with a food thermometer before removing meat from the heat source. For safety and quality, allow meat to rest for at least three minutes before carving or consuming. For reasons of personal preference, consumers may choose to cook meat to higher temperatures.</li>
              </ul>
            </div>
              <h5 class="title-note-section border-bottom p-10 c-orange">Thawing</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li><strong>Refrigerator:</strong> The refrigerator allows slow, safe thawing. Make sure thawing meat and poultry juices do not drip onto other food.</li>
                <li><strong>Cold Water:</strong> For faster thawing, place food in a leak-proof plastic bag. Submerge in cold tap water. Change the water every 30 minutes. Cook immediately after thawing.</li>
                <li><strong>Microwave:</strong> Cook meat and poultry immediately after microwave thawing.</li>
              </ul>
            </div>
              <h5 class="title-note-section border-bottom p-10 c-orange">Thawing</h5>
          <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li><strong>Refrigerator:</strong> The refrigerator allows slow, safe thawing. Make sure thawing meat and poultry juices do not drip onto other food.</li>
                <li><strong>Cold Water:</strong> For faster thawing, place food in a leak-proof plastic bag. Submerge in cold tap water. Change the water every 30 minutes. Cook immediately after thawing.</li>
                <li><strong>Microwave:</strong> Cook meat and poultry immediately after microwave thawing.</li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>


<?php if ((isset($data['pages_info']['nom']))&&($data['pages_info']['nom']!="search")) {?>
<section  class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1 p-t-30" style="height:150px">
          <img src="common-files/images/logo/logo2_gris.png" style="width:300px">
      </div>
      <div class="col-md-2 col-md-offset-1">
        <h4>Menu</h4>
        <p><a href="">Home</a></p>
        <p><a class="inscription" href="">Sign in</a></p>
        <p><a class="connexion" href="">Sign up</a></p>
      </div>
      <div class="col-md-2">
        <h4>Company Info</h4>
        <p><a href="cgu/">C.G.U</a></p>
        <p><a href="faq/">F.A.Q</a></p>
        <p><a href="contact/">Contact us</a></p>
      </div>
      <div class="col-md-3">
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
          infoWindow: {
              content: '<h4 class="pricing-heading color-scheme t-left">You want your dish her</h4>'
          }
      });

   <?php for ($i=0; $i <count($leslat) ; $i++) {?>
      var latdish = <?php echo $leslat[$i]?>;
      var longdish =<?php echo $leslong[$i]?>;
      var name = '<?php echo $lesname[$i]?>';
      var lesid =<?php echo $lesid[$i]?>;
      // If you want to add a marker
      my_map.addMarker({
          lat: latdish,
          lng: longdish,
          title: 'Dish',
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

  <script>
    simpleCart({
    // array representing the format and columns of the cart,
    // see the cart columns documentation
    cartColumns: [
        { attr: "name", label: "Name"},
        { view: "currency", attr: "price", label: "Price"},
        { view: "decrement", label: false},
        { attr: "quantity", label: "Qty"},
        { view: "increment", label: false},
        { view: "currency", attr: "total", label: "SubTotal" },
        { view: "remove", text: "Remove", label: false}
    ],
    // "div" or "table" - builds the cart as a 
    // table or collection of divs
    cartStyle: "div", 
    // how simpleCart should checkout, see the 
    // checkout reference for more info 
    checkout: { 
        type: "PayPal" , 
        email: "you@yours.com" 
    },
    // set the currency, see the currency 
    // reference for more info
    currency: "USD",
    // collection of arbitrary data you may want to store 
    // with the cart, such as customer info
    data: {},
    // set the cart langauge 
    // (may be used for checkout)
    language: "english-us",
    // array of item fields that will not be 
    // sent to checkout
    excludeFromCheckout: [],
    // custom function to add shipping cost
    shippingCustom: null,
    // flat rate shipping option
    shippingFlatRate: 0,
    // added shipping based on this value 
    // multiplied by the cart quantity
    shippingQuantityRate: 0,
    // added shipping based on this value 
    // multiplied by the cart subtotal
    shippingTotalRate: 0,
    // tax rate applied to cart subtotal
    taxRate: 0,
    // true if tax should be applied to shipping
    taxShipping: false,
    // event callbacks 
    beforeAdd            : null,
    afterAdd            : null,
    load                : null,
    beforeSave        : null,
    afterSave            : null,
    update            : null,
    ready            : null,
    checkoutSuccess    : null,
    checkoutFail        : null,
    beforeCheckout        : null,
        beforeRemove           : null
  });
  </script>

  </body>
</html>




