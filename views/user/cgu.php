  <?php include('layout/header.php'); ?>

  <section>
    <div class="container">
      <h2 class="section-title t-center">Basics for Handling Food Safely</h2>
      <div class="row bd-3" style="height:auto">
        <div class="col-md-6 col-sm-6 p-20 p-b-0 col-sm-12 justify">
        <div class="border-purple boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 c-purple">Shopping</h5>
            <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li>Purchase refrigerated or frozen items after selecting your non-perishables.</li>
                <li>Never choose meat or poultry in packaging that is torn or leaking.</li>
                <li>Do not buy food past "Sell-By," "Use-By," or other expiration dates</li>
              </ul>
              <a href="#"  class="m-t-20 scrollToTop btn btn-purple btn-transparent">Search your first dish</a>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 p-20 p-b-0 col-sm-12 justify">
        <div class="border-yellow bg-white boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10 c-orange">Storage</h5>
            <div class="m-t-20 m-b-60" style="overflow: hidden">
              <ul class="list-two t-grey" >
                <li>Always refrigerate perishable food within 2 hours—1 hour when the temperature is above 90 °F (32.2 ºC).</li>
                <li>The refrigerator should be at 40 °F (4.4 ºC) or below and the freezer at 0 °F (-17.7 ºC) or below.</li>
                <li>Cook or freeze fresh poultry, fish, ground meats, and variety meats within 2 days; other beef, veal, lamb, or pork, within 3 to 5 days.</li>
                <li>Perishable food such as meat and poultry should be wrapped securely to maintain quality and to prevent meat juices from getting onto other food.</li>
              </ul>
              <a href="<?php if(isset($_COOKIE['log'])){ echo 'user/createdish/';} else{ echo 'propose';} ?>" class="m-t-20 btn btn-orange btn-transparent">Propose a dish</a>
            </div>
        </div>
      </div>
    </div>
  </section>

<?php include('layout/footer.php'); ?>
