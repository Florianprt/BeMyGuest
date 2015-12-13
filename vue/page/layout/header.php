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
      <a class="navbar-brand m-t-10" href="home" style="background-image: url(common-files/images/logo/BMG_white.png); background-size :contain; background-repeat: no-repeat; width: 200px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="btheader" href="#"><div class="border-yellow  p-l-20 p-r-20 p-10">Yo want to cook?</div></a></li>
        <li class=""><a href="#">Help</a></li>
        <li class="inscription"><a href="#">Log in</a></li>
        <li class="connexion"><a href="#">Sign up</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<!--<fb:login-button id="logfb" scope="public_profile,email" onlogin="checkLoginState();">se conecter
</fb:login-button>-->
<div id="decofb" style="display:none"><button onclick="Logout();">se deco</button></div>
<div id="status">
</div>