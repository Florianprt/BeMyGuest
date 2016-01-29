  <?php include('layout/header.php'); ?>

  <section>
      <!--RECHERCHE -->
      <div id="leftpart" class="col-md-6 col-sm-5 col-xs-12 m-t-60">
        <div class="row">
          <div class="col-md-12 p-t-30 p-b-20 boxshadow bg-white" style="background-color: #fff;">
            <div id="formulaire" style="color:white">
              <div class="row">
                <div class="col-md-5 m-b-10 prepend-icon">
                  <input id="formwhere" type="text" class=" border-orange  form-control form-white placeholder t-center" value="<?php if (isset($data['search']['where'])) {echo $data['search']['where'];}?>" placeholder="Where ?">
                  <div id="nearhere">
                    <div id="nearhereinside">Look around</div>
                  </div>
                </div>
                <div class="col-md-4  m-b-10 prepend-icon">
                  <input id="datepicker" type="datepicker" class=" border-orange  form-control form-white placeholder t-center" placeholder="Choose date" value="<?php if (isset($data['search']['date'])) {echo $data['search']['date'];}?>">
                  <i class="line-icon-calendar"></i>
                </div>
                <div class="col-md-3 m-b-10 prepend-icon">
                  <input type="text" class=" border-orange form-control form-white placeholder" placeholder="How many ?" value="<?php if (isset($data['search']['cb'])) {echo $data['search']['cb'];}?>">
                  <i class="line-icon-user"></i>
                </div>
              </div>
            </div>
            <div class="row m-t-20 m-b-20">
              <div class="col-md-3 col-sm-12">
                <h4 class="section-title">Fourchette de prix</h4>
              </div>
              <div class="col-md-9 col-sm-12 p-t-20">
                <input type="text" id="prixrange" name="prixrange" value="" />
              </div>
            </div>
          </div>
        </div>
        <div id ="rowmap" class="row">
          <div class="map" id="my-map"></div>
        </div>
      </div>


      <!--RECHERCHE -->
      <div class="col-md-6 col-sm-7  col-xs-12" style="overflow: scroll;  margin-top: 80px;float:right">
        <div class="row">
          <?php for ($i=0; $i <15 ; $i++) { ?> 
          <!-- Single PLAT -->
          <div class="col-sm-6 col-xs-12 m-t-20">
            <div class="border boxshadow">
              <div style="height: 200px">
                <div class="search_prix"><p> 30 €</p></div>
                <div class="owl-carousel" data-plugin-options='{"autoPlay": false}' style="height:100%">
                  <div class="item">
                    <img src="common-files/images/dish/1.jpg" alt="ecommerce" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/2.jpg" alt="blog" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/3.jpg" alt="blog" class="img-responsive">
                  </div>
                </div>
              </div>
              <div class="p-20" align="center" style="position: relative">
              <a href="profil"><div class="smalliconprofil"></div></a>
              <h4 class="pricing-heading color-scheme t-left">Nom du plat</h4>
              <p class="justify">Sed a mauris sed metus feugiat congue. Proin semper velit mauris, a commodo turpis placerat vitae. Sed lorem nulla, ultrices in sem eu, luctus aliquam mi . . .</p>
              <a href="dish"  class="btn btn-purple btn-transparent">Réserver</a>
              </div>
            </div>
          </div>
          <!-- Single PLAT -->
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-md-12 m-t-40" style="background-color: #28292A; color:white;height: 60px;">
            Footer<br>
          </div>
        </div>
      </div>
      <!--RECHERCHE -->
    </section>

  <?php include('layout/footer.php'); ?>
