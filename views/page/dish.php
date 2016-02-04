<?php include('layout/header.php'); ?>

  <section>
    <div class="container">
        <div class="row m-t-60 boxshadow bd-3" style="height:auto">
          <div class="col-md-6 col-sm-6 col-xs-12 bd-3 p-0 " style=" height:254px; overflow: hidden">
                <div class="owl-carousel" data-plugin-options='{"autoPlay": 3000}' style="height:100%">
                  <div class="item">
                    <img src="common-files/images/dish/1.jpg" alt="ecommerce" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/2.jpg" alt="blog" class="img-responsive">
                  </div>
                  <div class="item">
                    <img src="common-files/images/dish/3.jpg" alt="blog" class="img-responsive">
                  </div>
                </div>
          </div>
          <div class="col-md-6 col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60" style="height:100%">
            <h2 class="section-title"><?php echo  $data['dish']['name']?></h2><div class="rateit p-20" data-rateit-value="2.5" data-rateit-resetable="false" data-rateit-readonly="true"></div>
          </div>
        </div>
        <div class="row m-t-40">
          <div class="col-md-8 col-sm-8 p-0 col-sm-12 justify">
              <p class="section-title m-t-40">location : <?php echo  $data['dish']['adresse']?></p>
              <p><?php echo  $data['dish']['desc']?></p>
              <p>Offre valable jusqu'au <?php echo  $data['dish']['finish']?></p>
              <a href="#"  class="btn btn-purple btn-transparent m-t-20">Voir l'intégralité des photos</a>
          </div>
          <div class="col-md-4 col-sm-4 p-0">
            <div class="row">
              <div class="col-md-10 col-md-offset-2 p-40 p-t-0">
                <div class=" row border-green boxshadow t-center p-b-20 bd-6">
                  <div class=" col-md-6 col-sm-6 col-xs-6 border-bottom p-10 m-t-0 t-left" style="background-color:#87D37C;height: 70px;">
                    <h5 class="title-note-section"><?php echo  $data['dish']['price']?> €</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 border-bottom p-20 m-t-0" style="background-color:#87D37C; height: 70px;">
                    <p class="t-right">for a dish</h5>
                  </div>
                  <div class="p-20 col-md-12 simpleCart_shelfItem">
                    <table class="table table-bordered">
                      <tbody>
                      <tr>
                        <span class="item_price" style="display:none"><?php echo  $data['dish']['price']?></span>
                        <td><span id="dishpricepayment"><?php echo  $data['dish']['price']?></span> € x 
                          <select id="selectquantitypayment" class="item_Quantity">
                          <?php for ($i=1; $i <= $data['dish']['quantity'] ; $i++) { ?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                          <?php } ?>
                          </select> dish</td>
                        <td class="text-right"><span id="changenewprice"><?php echo  $data['dish']['price']?></span> €</td>
                      </tr>
                      <tr>
                        <td>Service fees <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="15% of the dish price" data-original-title="Service fees"></i>
                        </td>
                        <td class="text-right" id="servicefeesprice"><span id="priceservicefee"><?php echo  $data['dish']['price']*15/100;?></span> €</td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td class="text-right"><span id="pricetotal" ><?php echo  $data['dish']['price']+($data['dish']['price']*15/100);?></span> €</td>
                      </tr>
                      </tbody>
                    </table>
                    <a href="payment/<?php echo $_GET['id'];?>"  class="item_add btn btn-purple btn-transparent">Procéder au payment</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container p-0">
      <div class="row row-eq-height">
        <div class="col-md-6 col-sm-6 p-20 col-sm-12 justify">
          <div class="border-yellow boxshadow t-center">
            <h5 class="title-note-section border-bottom p-10">Ingrédiens</h5>
              <div class="m-t-20 m-b-40" style="overflow: hidden">
                <ul class="list-two" >
                  <?php 
                  $theingrdient = explode(",",$data['dish']['ingredient']);
                  for ($i=0; $i < count($theingrdient); $i++) { ?>
                  <li><?php echo $theingrdient[$i]?></li>
                  <?php } ?>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 p-20">
          <div class="border-yellow boxshadow t-center">
            <h5 class="title-note-section border-bottom p-10 m-b-0">Localisation</h5>
            <div class="map" id="my-map"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('layout/footer.php'); ?>
