<!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="../" style="background-size: contain"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <ul class="nav nav-sidebar">
            <li class="<?php if((isset($dashboard))&&($dashboard == 1)){ ?>nav-active active<?php } ?> nav-parent"><a href="user/12"><i class="icon-home"></i><span>Dashboard</span></a></li>
            <li class="nav-parent <?php if((isset($dish))&&($dish == 1)){ ?>nav-active active<?php } ?>">
              <a><i class="icon-docs"></i><span>The Dish </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="user/createdish/">Create a dish</a></li>
                <li><a href="user/dish/">See your dish</a></li>
              </ul>
            </li>
            <li class="nav-parent">
              <a href=""><i class="icon-docs"></i><span>Messages </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="page.php">See</a></li>
              </ul>
            </li>
            <li class="nav-parent">
              <a href=""><i class="icon-docs"></i><span>Reservations </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="page.php">Look</a></li>
              </ul>
            </li>
            <li class="nav-parent <?php if((isset($profil))&&($profil == 1)){ ?>nav-active active<?php } ?>">
              <a><i class="icon-docs"></i><span>Your account</span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="user/profil/">Profile information</a></li>
                <li><a href="page.php">Account</a></li>
              </ul>
            </li>
          </ul>
          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="#" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
    
  <!-- Debut haut de la page header en blanc -->
    <?php include('header.php'); ?>
  <!-- Fin haut de la page header en blanc -->