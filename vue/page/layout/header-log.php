<script src="common-files/js/facebookconnect.js"></script>
<nav class="<?php if((isset($transparent))&&($transparent == '0')){?>topnav fixed-topnav  transparent topnav-top<?php } else {?>navbar navbar-default<?php }?>">
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="#"><div class="border-yellow  p-l-20 p-r-20 p-10">Yo want to cook?</div></a></li>
        <li class=""><a href="#">Help</a></li>
        <li class="desinscription"><a href="#" onclick="finishconnexion()">Log out</a></li>

        <!-- BEGIN USER DROPDOWN -->
        <li class="dropdown" id="user-header">
          <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img src="common-files/images/people/1.jpg" alt="user image">
          <span class="username">Hi, John Doe</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="user/<?php echo $_COOKIE['log']?>"><i class="icon-user"></i><span>My Profile</span></a>
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
              <a href="#"><i class="icon-logout" onclick="finishconnexion()"></i><span>Logout</span></a>
            </li>
          </ul>
        </li>
        <!-- END USER DROPDOWN -->

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<!--<fb:login-button id="logfb" scope="public_profile,email" onlogin="checkLoginState();">se conecter
</fb:login-button>-->
<div id="decofb" style="display:none"><button onclick="Logout();">se deco</button></div>
<div id="status">
</div>