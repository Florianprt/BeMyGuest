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
    <link href="common-files/plugins/select2/select2.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <body>
  <?php if (isset($_COOKIE['log'])) {
    include('vue/page/layout/header-log.php');
  }else { include('vue/page/layout/header.php');} ?>
  <header style="height:450px;position: relative">
      <div class="section-overlay" style="z-index: 0"></div>
    <div class="video-background .. " data-vide-bg="mp4: common-files/video/home , webm: common-files/video/home" data-vide-options="position: 50% 50%" style="height:100%">
      <h1 class="bmg-title t-center p-t-80" >Be my guest</h1>
      <h1 class="home-title t-center ">How about a meal <span style="font-weight: 700"> at a neighbor's</span></h1>
      <div style=" background-color: rgba(0,0,0, .4); height: auto;width:100%;position: absolute; bottom: 0;z-index: 45">
          <div class="col-md-12 p-t-40 p-b-40 ">
            <div id="formulaire" style="color:white">
              <div class="row formulairehome p-l-60 p-r-60 t-center">
              <!-- WHERE-->
                <div class="col-md-4">
                  <input id="formwhere" type="text" class="form-control form-white placeholder t-center" value="" placeholder="Where ?">
                  <div id="nearhere">
                    <div id="nearhereinside">Look around</div>
                  </div>
                </div>
              <!-- WHEN-->

                <div id="dateform" class="col-md-4 ">
                  <select id="valueform" class="form-control form-white" data-placeholder="When ?">
                    <option value="now">Today</option>
                    <option onclick="opendatepicker()" id="overday" value="after">One other day</option>
                  </select>
                </div>
              <!-- calendar-->
                <div id="calendarform" class="col-md-4">
                  <input id="datepicker" type="datepicker" class="form-control form-white placeholder t-center" value="Choose date">
                </div>

              <!-- nb -->
                <div class="col-md-2">
                  <input type="text" class="form-control form-white placeholder t-center" placeholder="How many ?">
                </div>
              <!-- BUTTON -->
                <div class="col-md-2 searchbuton">
                  <a href="search"class="m-b-0 btn btn-purple">Search</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
        <div class="row m-t-60 t-center">

          <div class="col-md-4">
          <img src="common-files/images/picto-t/picto-b1.png">
          </div>

          <div class="col-md-4">
          <img src="common-files/images/picto-t/picto-b2.png">
          </div>

          <div class="col-md-4">
          <img src="common-files/images/picto-t/picto-b3.png">
          </div>

        </div>
      </div>
  </section>


  <section>
    <div class="container">
        <div class="row m-t-60 boxshadow bd-3" style="height:auto">
          <div class="col-md-6 t-center col-sm-6 col-xs-12 boxshadow p-t-60 p-b-60" style="height: 452px; background-image: url(common-files/images/rechercher_plat.jpg); background-size : cover">
          </div>
          <div class="col-md-6 t-center col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title">Recherchez</h2>
            <p class="justify p-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum purus sit amet lectus finibus, a consequat lacus luctus. In hac habitasse platea dictumst. Nunc aliquam diam vitae turpis volutpat laoreet. Duis nec tempus turpis, placerat ultricies augue. Nam est lacus, ornare vel magna porta, porttitor lacinia velit.</p>
            <a href="#"class="btn btn-purple btn-transparent m-t-20">Are you angry ?</a>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container">
        <div class="row m-t-60 boxshadow bd-3" style="height:auto">
          <div class="col-md-12 t-center col-sm-6 bg-white col-xs-12 boxshadow p-60" style="height:100%">
            <h2 class="section-title">Cuisinez</h2>
            <p class="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum purus sit amet lectus finibus, a consequat lacus luctus. In hac habitasse platea dictumst. Nunc aliquam diam vitae turpis volutpat laoreet. Duis nec tempus turpis, placerat ultricies augue. Nam est lacus, ornare vel magna porta, porttitor lacinia velit. Praesent vel dignissim nibh. Ut quis felis risus. Donec pellentesque, velit at tincidunt placerat, arcu erat posuere diam, ut convallis nunc urna vel libero. Phasellus ac viverra nulla. Integer id enim nec mi sodales vestibulum.</p>
            <a href="#"class="btn btn-purple btn-transparent m-t-20">Are you a good cooker ?</a>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container">
        <div class="row m-t-60 boxshadow bd-3" style="height:auto">
          <div class="col-md-6 t-center col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title">Be my guest</h2>
            <p class="justify p-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum purus sit amet lectus finibus, a consequat lacus luctus. In hac habitasse platea dictumst. Nunc aliquam diam vitae turpis volutpat laoreet. Duis nec tempus turpis, placerat ultricies augue. Nam est lacus, ornare vel magna porta, porttitor lacinia velit.</p>
            <a href="#"class="btn btn-purple btn-transparent m-t-20">More information about us !</a>
          </div>
          <div class="col-md-6 t-center col-sm-6 col-xs-12 boxshadow p-t-60 p-b-60" style="height: 453px; background-image: url(common-files/images/bemyguest.jpg); background-size : cover">
          </div>
        </div>
      </div>
  </section>


  <section  class="m-t-40" style="height: 150px; width: 100%; background-color: black"></section>
  <script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
  <script src="common-files/plugins/jquery/jquery-ui.min.js"></script>
  <script src="common-files/js/ajaxpopup.js"></script>
  <script src="common-files/js/application.js"></script>
  <script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>
  <script src="common-files/user/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->

  <!-- BEGIN PAGE SCRIPTS -->
  <script src="common-files/plugins/vide/jquery.vide.min.js"></script>
  <script src="common-files/plugins/select2/select2.min.js"></script>
  <!-- END PAGE SCRIPTS -->


  <script>
  $( "#formwhere" ).on( "click", function() {
    $( "#nearhere" ).fadeIn();
  });

  $( "#nearhereinside" ).on( "click", function() {
    $( "#nearhere" ).fadeOut();
    $('#formwhere').val($("#nearhereinside").html());
  });

  $( "#formwhere" ).on("focusout",function() {
    $( "#nearhere" ).fadeOut();
  });

    $( "#valueform" ).change(function() {
      $( "#nearhere" ).fadeOut();
      var value = 'after';
      var thevalue = $("#valueform").val();

      if (value == thevalue) {
        $( "#dateform" ).hide();
        $( "#calendarform" ).show();
        $( "#datepicker" ).focus();
    }
    });

    $('#datepicker').datepicker({ minDate: 0 });

  </script>
  </body>
</html>