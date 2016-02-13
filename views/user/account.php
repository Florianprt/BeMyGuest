
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
                  <h3><i class="icon-note"></i>Please enter your bank inforamtion to receive your payment on your bank account</h3>
                </div>
                <div class="panel-content">
                <form id="profil_form" method="post" action="<?php echo BASE.'user/account/'; ?>" autocomplete="off" enctype="multipart/form-data">
                  <div class="row m-b-30">
                    <div class="col-md-6">
                      <h2>Last name</h2>
                      <input class="form-control form-white" required name="nombank" type="text" placeholder="Write our last name" value="<?php if(isset($data['bankinfo']['nombank'])){echo $data['bankinfo']['nombank'];} ?>">
                    </div>
                    <div class="col-md-6">
                      <h2>First name</h2>
                      <input class="form-control form-white" required name="prenombank" type="text" placeholder="Write our first name" value="<?php if(isset($data['bankinfo']['prenombank'])){echo $data['bankinfo']['prenombank'];} ?>">
                    </div>
                    <div class="col-md-8">
                      <h2>IBAN</h2>
                      <input class="form-control form-white" name="iban" required placeholder="Write our IBAN code" maxlength="27" value="<?php if(isset($data['bankinfo']['iban'])){echo $data['bankinfo']['iban'];} ?>">
                    </div>
                    <div class="col-md-4">
                      <h2>BIC</h2>
                      <input name="bic" type="text" class="form-control form-white" requiredrequired  placeholder="Write our BIC code" maxlength="11" value="<?php if(isset($data['bankinfo']['bic'])){echo $data['bankinfo']['bic'];} ?>">
                    </div>
                  </div><!-- fin row-->
                  <div class="row m-t-30">
                    <div class="col-sm-9 col-sm-offset-3">
                      <div class="pull-right">
                        <button type="submit" name="envoyer" class="btn btn-embossed btn-primary m-r-20">Envoyer</button>
                      </div>
                    </div><!-- fin col sm 9-->
                  </div><!-- fin row -->
                </form>
                </div><!-- fin panel content-->
              </div>

              </div>
            </div>
          </div>
          <?php include('layout/footer.php'); ?>
        