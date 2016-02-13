
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12 col-sm-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Oh Hello <?php echo $data['personnal_information']['first_name']?>,<br>Here there are your recomandations, who have some over ?<br> Let's do it ... </h3>
                </div>
              </div>

              <div class="panel">
                <div class="panel-header">
                  <h3><i class="icon-note"></i>You want to have some recommandation to your Friend?<br> Perfect juste enter there email adresse</h3>
                </div>
                <div class="panel-content">
                <form id="profil_form" method="post" action="<?php echo BASE.'user/recomandations/'; ?>" autocomplete="off" enctype="multipart/form-data">
                  <div class="row m-b-30">
                    <div class="col-md-6 col-md-offset-3">
                      <h2>Email adress</h2>
                      <input class="form-control form-white" required name="email" type="email" placeholder="Write you friend email" >
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
        