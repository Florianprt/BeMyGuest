<!DOCTYPE HTML>
<html>
  <head>
    <title>Be My guest | Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="common-files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="common-files/css/styles.css"/>
    <link rel="stylesheet" href="common-files/css/custom.css"/>
    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/plugins/rateit/rateit.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <body>

  <?php include('vue/page/layout/header.php'); ?>

<fb:login-button id="logfb" scope="public_profile,email" onlogin="checkLoginState();">se conecter
</fb:login-button>
<div id="decofb" style="display:none"><button onclick="Logout();">se deco</button></div>

<div id="status">
</div>


  <section class="m-t-60">
    <div class="container">
        <div class="row m-t-60">
          <div class="col-md-8 col-sm-12">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
                  <img src="common-files/images/people/1.jpg" class="bd-50p" width="100%" alt="team 1">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 m-t-40">
                  <h2 class="title-name">John Doe</h2>
                  <p>Cuisine à Paris • 75004 & membre depuis 2014</p>
                </div>
                </div>
              </div>
            </div>
            <div class="row m-t-20">
              <div class="col-md-12 justify">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur luctus sapien sed velit semper, ac lobortis libero convallis. Nam vulputate eget nibh non porta. Suspendisse pharetra venenatis suscipit. Quisque varius nisl ac purus fermentum, quis auctor sem fringilla. Mauris venenatis et mi a ullamcorper. Pellentesque faucibus ornare velit. Ut ultricies nulla vitae arcu fermentum luctus. Vivamus magna mauris, scelerisque nec aliquam quis, consectetur vitae ante. Nulla facilisi.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 p-40">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20">123</h5>
                  <p>commentaires</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 p-40">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20">13</h5>
                  <p>recommendations</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 p-40">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20">4</h5>
                  <p>plats</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="row">
              <div class="col-md-10 col-md-offset-2  p-b-20">
                <div class="border-yellow boxshadow t-center p-b-40">
                  <h5 class="title-note-section border-bottom p-10">Cuisinier</h5>
                  <div class="rateit p-20" data-rateit-value="2.5" data-rateit-resetable="false" data-rateit-readonly="true"></div>
                </div>
              </div>
              <div class="col-md-10 col-md-offset-2 p-b-20 ">
                <div class="border-green boxshadow t-center p-b-40">
                  <h5 class="title-note-section border-bottom p-10">Gourmand</h5>
                  <div class="rateit p-20" data-rateit-value="3.5" data-rateit-resetable="false" data-rateit-readonly="true"></div>
                </div>
              </div>
              <div class="col-md-10 col-md-offset-2">
                <div class="border-purple boxshadow t-center p-b-40">
                  <h5 class="title-note-section border-bottom p-10">Vérifications</h5>
                  Facebook check<br>email check
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section  class="m-t-40" style="height: 150px; width: 100%; background-color: black"></section>
    <script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="common-files/plugins/rateit/jquery.rateit.min.js"></script> 

  </body>
</html>
