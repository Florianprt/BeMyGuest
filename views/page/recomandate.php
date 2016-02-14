<?php include('layout/header.php'); ?>
  <section class="m-t-80" <?php if ((isset($data['bueno']['ok']))&&($data['bueno']['ok']=="ok")) {echo 'style="display:none"';} ?>>
    <div <?php if (isset($_COOKIE['log'])) {echo 'style="display:none"';} ?>class="container">
      <div class="row t-center">
        <h2 class="section-title t-center">Please connect you or create an account to use this services !</h2>
        <div class="m-t-60 m-b-100">
          <button class="btn haveto btn-purple  btn-transparent" >Let's do it</button>
        </div>
      </div>
    </div>
    <div <?php if (!isset($_COOKIE['log'])) {echo 'style="display:none"';} ?>class="container">
      <div class="row t-center">
        <h2 class="section-title t-center">Hi , can you recommend your friend !</h2>
      </div>
      <div class="row m-t-40 t-center">
        <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
          <img src="<?php echo $data['user_get']['image'];?>" class="bd-50p" width="100%" alt="team 1">
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <p>Please recommend your friend <?php echo $data['user_get']['nom'].' '.$data['user_get']['prenom']; ?> for his delicious famous small dishes!</p>
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
