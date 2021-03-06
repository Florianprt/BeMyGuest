  <?php include('layout/header.php'); ?>
  <header class="home-header">
      <div class="section-overlay" style="z-index: 0"></div>
    <div class="video-background .. " data-vide-bg="mp4: <?php echo DEFAULT_FILE_MANAGER.'home/video/'?>home , webm: <?php echo DEFAULT_FILE_MANAGER.'home/video/'?>home" data-vide-options="position: 50% 50%" style="height:100%">
      <h1 class="bmg-title t-center p-t-80" >Be my guest</h1>
      <h1 class="home-title t-center ">How about a meal <span style="font-weight: 700"> at a neighbor's</span></h1>
      <div style=" background-color: rgba(0,0,0, .4); height: auto;width:100%;position: absolute; bottom: 0;z-index: 45">
          <div class="col-md-12 p-t-40 p-b-40 ">
            <div id="formulaire" style="color:white">
              <div class="row formulairehome p-l-60 p-r-60 t-center">
              <form role="form" method="post" action="<?php echo BASE.'search'; ?>">
              <!-- WHERE-->
                <div class="col-md-4 col-sm-4">
                  <input id="formwhere" name="where" type="text" class="form-control form-white placeholder t-center" value="" placeholder="Where ?">
                  <img id="gifgeoloc" style="display:none" src="common-files/images/ripple.gif">
                  <input id="lat" name="lat"  style="display: none" type="text" class="form-control" value="">
                  <input id="lng" name="lng"  style="display: none" type="text" class="form-control" value="">
                  <div id="nearhere">
                    <div id="nearhereinside">Look around</div>
                  </div>
                </div>
              <!-- WHEN-->

                <div id="dateform" class="col-md-4 col-sm-4">
                  <select id="valueform" class="form-control form-white" data-placeholder="When ?">
                    <option value="now">Today</option>
                    <option onclick="opendatepicker()" id="overday" value="after">One other day</option>
                  </select>
                </div>
              <!-- calendar-->
                <div id="calendarform" class="col-md-4 col-sm-4">
                  <input id="datepicker" name="date" type="datepicker" class="form-control form-white placeholder t-center" value="now">
                </div>

              <!-- nb -->
                <div class="col-md-2 col-sm-2">
                  <select  class="form-control form-white" data-placeholder="How many ?" name="cb">
                  <?php for ($i=1; $i <=11 ; $i++) { ?>
                    <option value="<?php echo $i;?>"><?php if($i!=11){echo $i;} else{echo 'more';}?></option>
                  <?php }?>
                  </select>
                </div>
              <!-- BUTTON -->
                <div class="col-md-2 col-sm-2 searchbuton">
                  <button id="btnsearch" type="submit" name="btnformaccueil" class="m-b-0 btn btn-purple">Search</button>
                </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
        <div class="row t-center">

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond">
              <i class="icons-food-11" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Home made</h5>
            <p>Today, home-made is everywhere.<br>The website promotes Homemade cooking. For the "cooker" and people who want to eat healthy food.</p>

          </div>

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond">
              <i class="icons-emoticons-01" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Socialize</h5>
            <p>Our service can help people to meet new people.<br>They can invite them when they come to take their meals.</p>
          </div>

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond">
              <i class="icons-ecology-02" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Avoid waste</h5>
            <p>When you have cooked too much, you can sell the leftovers on our website. It’ s a good way to avoid wasting food and make a little money.</p>
          </div>

        </div>
      </div>
  </section>

  <section>
    <div class="container">
      <h2 class="section-title t-center">Advantages to use our service</h2>
      <div class="row bd-3" style="height:auto">
        <div class="col-md-6 col-sm-6 p-20 p-b-0 col-sm-12 justify">
        <div class="border-purple boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 c-purple">Hungry ?</h5>
            <div class="m-t-20 m-b-60" style="overflow: hidden">
              <div class="row">
                <ul class="list-two t-grey" >
                  <li>Healthy dishes, fresh ingredients, friendly prices</li>
                  <li>Delicious meals, home cooked with love</li>
                  <li>Discover original and traditional recipes</li>
                  <li>Your favorite food, a few clicks away</li>
                </ul>
              </div>
              <a href="#"  class="m-t-20 scrollToTop btn btn-purple btn-transparent">Search your first dish</a>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 p-20 p-b-0 col-sm-12 justify">
        <div class="border-yellow bg-white boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 c-orange">Be a chef</h5>
            <div class="m-t-20 m-b-60" style="overflow: hidden">
              <div class="row">
                <ul class="list-two t-grey" >
                  <li>Offer people an easy access to delicious dishes</li>
                  <li>Make someone happy with your left-overs, be eco-frendly</li>
                  <li>Make money with your passion, a dream coming true</li>
                  <li>Reconnect people to their home-food</li>
                </ul>
              </div>
              <a <?php if(isset($_COOKIE['log'])){ echo 'href="user/createdish/"';} else{ echo 'href="#" ';} ?> class="<?php if(isset($_COOKIE['log'])){ echo 'haveto';} else{ echo 'haveto';} ?> m-t-20 btn btn-orange btn-transparent">Propose a dish</a>
            </div>
        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="container">
      <div class="col-md-12">
        <div class="row row-eq-height boxshadow bd-3">
          <div class="col-md-6 t-center col-sm-12 col-xs-12 boxshadow display770" style="background-image: url(<?php echo DEFAULT_FILE_MANAGER.'bestcooker/1.jpg';?>); background-size : cover">
          </div>
          <div class="col-md-6 t-center col-sm-12 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title">The cook of the moment</h2>
            <p class="justify p-20 p-b-0">" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum purus sit amet lectus finibus, a consequat lacus luctus. In hac habitasse platea dictumst. Nunc aliquam diam vitae turpis volutpat laoreet. Duis nec tempus turpis, placerat ultricies augue. "</p>
            <p class="c-orange namepeople t-right p-r-20">Maria Delavegas</p>
            <a <?php if(isset($_COOKIE['log'])){ echo 'href="user/createdish/"';} else{ echo 'href="#" ';} ?> class="<?php if(isset($_COOKIE['log'])){ echo 'haveto';} else{ echo 'haveto';} ?> m-t-20 btn btn-orange btn-transparent">Become a cooker to ?</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('layout/newsletter.php'); ?>


  <?php include('layout/footer.php'); ?>
