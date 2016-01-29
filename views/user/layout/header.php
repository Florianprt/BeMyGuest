      
      <!-- Debut haut de la page header en blanc -->

      <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <li class=""><a class="btheader" href="user/createdish/"><div class="border-yellow  p-l-20 p-r-20">let's get cooking</div></a></li>
              <li class=""><a href="#">Help</a></li>
              <li class=""><a href="home">Go back to site</a></li>
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img class="border-purple" src="<?php echo $data['personnal_information']['image']?>" alt="user image">
                <span class="username">Hi, <?php echo $data['personnal_information']['name'].' '.$data['personnal_information']['first_name']?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="user/dish/"><i class="icons-food-11"></i><span>My Dish</span></a>
                  </li>
                  <li>
                    <a href="user/profil/"><i class="icon-settings"></i><span>Account Settings</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-bubbles"></i><span>My Message</span></a>
                  </li>
                  <li>
                    <a href="javascript:finishconnexion('user');"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->