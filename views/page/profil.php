  <?php include('layout/header.php'); ?>

  <section>
    <div class="container">
        <div class="row m-t-60">
          <div class="col-md-8 col-sm-12">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
                  <img src="<?php echo $data['person']['image'];?>" class="bd-50p" width="100%" alt="team 1">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 m-t-40">
                  <h2 class="title-name"><?php echo $data['person']['nom'].' '.$data['person']['prenom']?></h2>
                  <p><?php if ($data['person']['age']!=""){echo 'Is '.$data['person']['age'].' years old & ';} if ($data['person']['ville']!="") { echo 'Live in '.$data['person']['ville'];} if ($data['person']['zipcode']!="") { echo ' • '.$data['person']['zipcode'].' & ';}?>Member since <?php echo $data['person']['membresince']?></p>
                </div>
                <a href="#"  class="m-t-20 scrollToTop btn btn-purple btn-transparent">Contact him</a>
                </div>
              </div>
            </div>
            <div class="row m-t-20">
              <div class="col-md-12 justify">
              <p><?php echo $data['person']['description'];?> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 p-40">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20">?</h5>
                  <p>commentaires</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 p-40 goToRecoSection">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20"><?php echo $data['reco']['nombre'];?></h5>
                  <p>recommendations</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 p-40 goToDishSection">
                <div class="border-yellow t-center badgeprofil">
                  <h5 class="p-20"><?php echo$data['dish']['nombre'];?></h5>
                  <p>dish</p>
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
                  <?php if($data['validation']['facebook']==1){echo 'Facebook check<br>';} if($data['validation']['email']==1){echo 'Email check<br>';} if($data['validation']['bank']==1){echo 'Bank informations check<br>';}
                  if(($data['validation']['facebook']==0)&&($data['validation']['email']==0)&&($data['validation']['bank']==0)){ echo 'No checks !';}
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section id="SectionRecoProfil" <?php if($data['reco']['nombre']==0){ echo 'style="display:none"';} ?>>
    <div class="container m-t-40">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12">
          <div class="row">
            <div class="col-md-12">
              <div class="border boxshadow bd-6" style="overflow: hidden">
                <h5 class="bloc-title border-bottom p-30">Recommendation</h5>
                <?php
                foreach ($data['function']['GetReco'] as $item) { 
                  $img = $item['image'];
                  $idwriter = $item['bmg_user_writer'];
                  $reco = $item['reco'];
                  $date = $item['date'];
                ?>
                  <div class="row border-bottom p-20">
                    <div class="col-md-2 t-right">
                      <a href="profil/<?php echo $idwriter ?>">
                        <img src="<?php echo $img ?>" class="bd-50p" width="40%" alt="team 1">
                      </a>
                    </div>
                    <div class="col-md-9 p-r-20 justify">
                      <p><?php echo $reco ?><br><span class="c-orange">Write the <?php echo $date ?></span></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="SectionDishProfil">
    <div class="container m-t-40">
      <div class="row">
        <?php 
        foreach ($data['function']['dishOn'] as $item ) {
          $id = $item['idbmg_dish'];
          $idperson = $item['bmg_user_idbmg_user'];
          $dishname = $item['dishname'];
          $dishadress = $item['dishadress'];
          $dishzipcode = $item['dishzipcode'];
          $dishdesc = $item['dishdesc'];
          $dishprice = $item['dishprice'];
          $dishquantity = $item['dishquantity'];
          $dishlat= $item['dishlat'];
          $dishlong= $item['dishlong'];
          $dir    = DEFAULT_LINK_FILE.$idperson.'/dish/'.$id;
          $files = scandir($dir);
          ?>

         <!-- Single PLAT -->
          <div class="col-md-3  col-sm-4 col-xs-6 m-t-20">
            <div  class="border boxshadow">
              <div style="height: 200px">
                <div class="search_prix"><p> <?php echo $dishprice?> €</p></div>
                <div class="owl-carousel" data-plugin-options='{"autoPlay": false}' style="height:100%">
                <?php
                $i=0;
                for($j=0; $j<count($files); $j++){
                if ($files[$j] != "." && $files[$j]!= ".." && $files[$j]!= ".DS_Store") {
                    $i++;
                    $name[$j]=str_replace("","",$files[$j]);
                    $bon_name[$j]=$name[$j];
                    $bon_name[$j]=str_replace(".jpg","",$bon_name[$j]); ?>
                  <div class="item">
                    <img src="<?php echo $dir.'/'.$files[$j]?>" alt="ecommerce" class="img-responsive">
                  </div>
                <?php }}
                if($i==0){ ?>
                  <div class="item">
                    <img src="<?php echo DEFAULT_LINK_FILE.'default/dish.jpg'?>" alt="ecommerce" class="img-responsive">
                  </div>
                <?php }?>
                </div>
              </div>
              <div class="p-20" align="center" style="position: relative">
              <a href="profil/<?php echo $idperson?>"><div class="smalliconprofil" style="    background-image: url('<?php echo $data['person']['image'];?>');"></div></a>
              <h4 class="pricing-heading color-scheme t-left"> <?php echo $dishname?></h4>
              <div class="minidesc"><p class="justify"><?php echo $dishdesc?></p></div>
              <a href="dish/<?php echo $id?>/<?php echo date('m-d-Y');?>"  class="btn btn-purple btn-transparent">Learn more</a>
              </div>
            </div>
          </div>
          <!-- Single PLAT -->
        <?php }?>
      </div>
    </div>
  </section>


  <?php include('layout/footer.php'); ?>
