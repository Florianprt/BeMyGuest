<?php include('layout/header.php'); ?>


  <section class="m-t-80">
    <div class="container">
      <div class="row t-center">
        <h2 class="section-title t-center">Your contact for the reservation !</h2>
      </div>
      <div class="row m-t-40 t-center">
        <p>The reservation is about the dish <span class="c-orange"><?php echo $data['dish']['name'];?> </span>for the <?php echo $data['dish']['for'];?></p>
      </div>
      <div class="row m-t-40 t-center">
        <div class="col-md-3 col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
        <img src="<?php echo $data['dish']['img'];?> ">
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <form id="profil_form" method="post" action="<?php echo BASE.'message/'.$_GET['id']; ?>" autocomplete="off" enctype="multipart/form-data">
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