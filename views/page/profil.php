  <?php include('layout/header.php'); ?>

  <section>
    <div class="container">
        <div class="row m-t-60">
          <div class="col-md-8 col-sm-12">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
                  <img src="common-files/images/people/1.jpg" class="bd-50p" width="100%" alt="team 1">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 m-t-40">
                  <h2 class="title-name">John Doe</h2>
                  <p>Cuisine à Paris • 75004 & membre depuis 2014</p>
                </div>
                </div>
              </div>
            </div>
            <div class="row m-t-20">
              <div class="col-md-12 justify">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur luctus sapien sed velit semper, ac lobortis libero convallis. Nam vulputate eget nibh non porta. Suspendisse pharetra venenatis suscipit. Quisque varius nisl ac purus fermentum, quis auctor sem fringilla. Mauris venenatis et mi a ullamcorper. Pellentesque faucibus ornare velit. Ut ultricies nulla vitae arcu fermentum luctus. Vivamus magna mauris, scelerisque nec aliquam quis, consectetur vitae ante. Nulla facilisi.</p>
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
                  <h5 class="p-20">4</h5>
                  <p>plats</p>
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
                  Facebook check<br>email check
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
