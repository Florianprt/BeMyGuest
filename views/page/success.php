<?php include('layout/header.php'); ?>


  <section class="m-t-80">
    <div class="container">
      <div class="row t-center">
        <h2 class="section-title t-center">Hi , thank's for your purchase !</h2>
      </div>
      <div class="row m-t-40 t-center">
        <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <p>Contact your cooker, <?php echo $data['user_get']['nom'].' '.$data['user_get']['prenom']; ?> ! like that you will can have more informations to get your dishes  </p>
          <form id="profil_form" method="post" action="<?php echo BASE.'recomandate/'.$_GET['id']; ?>" autocomplete="off" enctype="multipart/form-data">
            <textarea class="m-t-40 textereco" name="thereco" required></textarea>
            <div class="row">
              <button type="submit" name="envoyer" class="btn btn-purple  btn-transparent" >Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php include('layout/footer.php'); ?>
