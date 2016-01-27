  <?php include('layout/header.php'); ?>
<?php 
/*echo $data;
echo $_COOKIE['log'].'<br>';
echo substr($_COOKIE['log'], 5, 1).'<br>';
$email =  explode("|", $_COOKIE['log']);
echo end($email);*/
//print_r($data);
?>
  <header class="home-header">
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
        <div class="row t-center">

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond" style="border: 2px solid #ee6416; border-radius : 50%; width : 150px ; height : 150px;padding: 30px;">
              <i class="icons-food-11" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Become a cook</h5>
            <p>Our service can help people to meet new people.<br>They can invite them when they come to take their meals.</p>

          </div>

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond" style="border: 2px solid #ee6416; border-radius : 50%; width : 150px ; height : 150px;padding: 30px;">
              <i class="icons-emoticons-01" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Socialize</h5>
            <p>Our service can help people to meet new people.<br>They can invite them when they come to take their meals.</p>
          </div>

          <div class="col-md-4 col-sm-4" align="center">
            <div class="icon_rond" style="border: 2px solid #ee6416; border-radius : 50%; width : 150px ; height : 150px;padding: 30px;">
              <i class="icons-ecology-02" style="font-size :70px; color :#763568 ;"></i>
            </div>
            <h5 class="title-note-section border-bottom p-10 t-black">Avoid the mess</h5>
            <p>When you cook to much. You can sell the meals left on our website.<br>So it s a good way to avoid the mess and get money.</p>
          </div>

        </div>
      </div>
  </section>

  <section>
    <div class="container">
      <h2 class="section-title t-center">Advantages to use our service</h2>
      <div class="row bd-3" style="height:auto">
        <div class="col-md-6 col-sm-6 p-20 col-sm-12 justify">
        <div class="border-yellow boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 t-black">Become a customers</h5>
            <div class="m-t-20 m-b-40" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <?php for ($i=0; $i < 4; $i++) { ?>
                <li>Lorem ipsum deffe fefe</li>
                <?php } ?>
              </ul>
              <a href="#" class="btn btn-purple btn-transparent">Search your first meal</a>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 p-20 col-sm-12 justify">
        <div class="border-yellow boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 t-black">Become a cook</h5>
            <div class="m-t-20 m-b-40" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <?php for ($i=0; $i < 4; $i++) { ?>
                <li>Lorem ipsum deffe fefe</li>
                <?php } ?>
              </ul>
              <a href="#" class="btn btn-orange btn-transparent">Propose a meal</a>
            </div>
        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="container">
        <div class="row boxshadow bd-3" style="height:auto">
          <div class="col-md-6 t-center col-sm-6 col-xs-12 boxshadow" style="height: 452px; background-image: url(common-files/images/rechercher_plat.jpg); background-size : cover">
          </div>
          <div class="col-md-6 t-center col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title">The cook of the moment</h2>
            <p class="justify p-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum purus sit amet lectus finibus, a consequat lacus luctus. In hac habitasse platea dictumst. Nunc aliquam diam vitae turpis volutpat laoreet. Duis nec tempus turpis, placerat ultricies augue. Nam est lacus, ornare vel magna porta, porttitor lacinia velit.</p>
            <a href="#"class="btn btn-purple btn-transparent m-t-20">Are you angry ?</a>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container">
        <div class="row boxshadow bd-3" style="height:auto">
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


  <?php include('layout/footer.php'); ?>
