
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12 col-sm-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Oh Hello <?php echo $data['personnal_information']['first_name']?>,<br>Here there are your account inforamtions , who want to change it ?<br> Let's do it ... </h3>
                </div>
              </div>

              <div class="panel">
                <div class="panel-header">
                </div>
                <div class=" t-center">
                  <button type="button" class="btn btn-warning btn-transparent">Banque informations</button>
                  <button type="button" class="btn btn-warning btn-transparent">Facturation informations</button>
                  <button type="button" class="btn btn-warning btn-transparent">Transaction history</button>
                </div>
              </div>

              <div class="panel">
                <div class="panel-header">
                  <h3><i class="icon-note"></i>Your profil informations</h3>
                </div>
                <div class="panel-content">
                  <div class="row m-b-30">
                    <div class="col-md-6">
                    <h2>img</h2>
                    </div>
                    <div class="col-md-6">
                      <h2>Last name</h2>
                      <input class="form-control form-white" name="last_name" type="text" placeholder="Write our last name" value="<?php if(isset($data['user_info']['nom'])){echo $data['user_info']['nom'];} ?>">
                      <h2>First name</h2>
                      <input class="form-control form-white" name="first_titre" type="text" placeholder="Write our first name" value="<?php if(isset($data['user_info']['prenom'])){echo $data['user_info']['prenom'];} ?>">
                    </div>
                    <div class="col-md-3">
                      <h2>Age</h2>
                      <input type="text" value="<?php if(isset($data['user_info']['age'])){echo $data['user_info']['age'];} ?>" data-step="1" class="numeric-stepper form-control form-white" />
                    </div>
                    <div class="col-md-9">
                      <h2>Address email</h2>
                      <input class="form-control form-white" name="email" type="email" required placeholder="Write our email address" value="<?php if(isset($data['user_info']['email'])){echo $data['user_info']['email'];} ?>">
                    </div>
                    <div class="col-md-6">
                      <h2>Zip Code</h2>
                      <input name="arrondissement" type="text" data-mask="99999" class="form-control form-white" placeholder="Write our zip code" value="<?php if(isset($data['user_info']['arrondissement'])){echo $data['user_info']['arrondissement'];} ?>">
                    </div>
                    <div class="col-md-6">
                      <h2>City</h2>
                      <input class="form-control form-white" name="ville" type="text" placeholder="Write ou city" value="<?php if(isset($data['user_info']['ville'])){echo $data['user_info']['ville'];} ?>">
                    </div>
                    <div class="col-md-12">
                      <h2>Address</h2>
                      <input class="form-control form-white" name="adresse" type="text" placeholder="Write our address" value="<?php if(isset($data['user_info']['adresse'])){echo $data['user_info']['adresse'];} ?>">
                      <h2>Description</h2>
                      <textarea class="form-control form-white" name="description" type="text" placeholder="Your description" value="<?php if(isset($data['user_info']['description'])){echo $data['user_info']['description'];} ?>"></textarea> 
                    </div>
                  </div><!-- fin row-->
                  <div class="row m-t-30">
                    <div class="col-sm-9 col-sm-offset-3">
                      <div class="pull-right">
                        <button type="submit" name="envoyer" class="btn btn-embossed btn-primary m-r-20">Envoyer</button>
                      </div>
                    </div><!-- fin col sm 9-->
                  </div><!-- fin row -->
                </div><!-- fin panel content-->
              </div>

              </div>
            </div>
          </div>
          <?php include('layout/footer.php'); ?>
        