<!DOCTYPE HTML>
<html>
  <head>
    <title><?php echo $data['pages_info']['title'] ?></title>
    <base href="<?php echo BASE ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="common-files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="common-files/css/styles.css"/>
    <link rel="stylesheet" href="common-files/css/custom.css"/>
    <link href="common-files/plugins/magnific/magnific-popup.min.css" rel="stylesheet">

    <!-- BEGIN PAGE STYLE -->
    <link href="common-files/plugins/select2/select2.css" rel="stylesheet">
    <link href="common-files/plugins/rateit/rateit.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="common-files/plugins/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link rel="stylesheet" href="common-files/plugins/owl/owl.carousel.min.css">
    <!-- END PAGE STYLE -->
  </head>
  <body>
  <script src="common-files/js/facebookconnect.js"></script>


<nav class="topnav fixed-topnav   topnav-top">
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
        <li class=""><a class="btheader" href="#"><div class="border-yellow  p-l-20 p-r-20 p-10">Yo want to cook?</div></a></li>
        <li class=""><a href="#">Help</a></li>
        <li class="inscription"><a href="#">Sign up</a></li>
        <li class="connexion"><a href="#">Sign in</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->



    <!-- Collect the nav links, forms, and other content for toggling -->
    <div  id="headerajaxconnect" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="display: none !important">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="#"><div class="border-yellow  p-l-20 p-r-20 p-10">Yo want to cook?</div></a></li>
        <li class=""><a href="#">Help</a></li>

        <!-- BEGIN USER DROPDOWN -->
        <li class="dropdown" id="user-header">
          <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img src="common-files/images/people/1.jpg" alt="user image">
          <span class="username">Hi, John Doe</span>
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
        <li class=""><a class="btheader" href="#"><div class="border-yellow  p-l-20 p-r-20 p-10">Yo want to cook?</div></a></li>
        <li class=""><a href="#">Help</a></li>

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