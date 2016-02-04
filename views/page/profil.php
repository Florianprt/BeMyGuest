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
              <p><?php echo$data['person']['description'];?> </p>
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

  <section>
    <div class="container m-t-40">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12">
          <div class="row">
            <div class="col-md-12">
              <div class="border boxshadow bd-6" style="overflow: hidden">
                <h5 class="bloc-title border-bottom p-30">Commentaires</h5>
                <?php
                for ($i=0; $i < 4; $i++) { ?>
                  <div class="row border-bottom p-20">
                    <div class="col-md-2 t-right">
                      <img src="common-files/images/people/1.jpg" class="bd-50p" width="40%" alt="team 1">
                    </div>
                    <div class="col-md-9 p-r-20 justify">
                      Vivamus tellus risus, blandit at suscipit vel, bibendum nec metus. Nunc eu consequat ipsum, nec efficitur felis. Quisque mauris libero, commodo et cursus vitae, maximus id libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis gravida velit eros, eu volutpat neque faucibus quis.
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>     
          </div>
          <div class="row m-t-40">
            <div class="col-md-12">
              <div class="border boxshadow bd-6" style="overflow: hidden">
                <h5 class="bloc-title border-bottom p-30">Recommendations</h5>
                <?php
                for ($i=0; $i < 4; $i++) { ?>
                  <div class="row border-bottom p-20">
                    <div class="col-md-2 t-right">
                      <img src="common-files/images/people/1.jpg" class="bd-50p" width="40%" alt="team 1">
                    </div>
                    <div class="col-md-9 p-r-20 justify">
                      Vivamus tellus risus, blandit at suscipit vel, bibendum nec metus. Nunc eu consequat ipsum, nec efficitur felis. Quisque mauris libero, commodo et cursus vitae, maximus id libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis gravida velit eros, eu volutpat neque faucibus quis.
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('layout/footer.php'); ?>
