<?php include('layout/header.php'); ?>

  <section>
    <div class="container">
        <div class="row row-eq-height m-t-60 boxshadow bd-3" >
          <div class="col-md-6 col-sm-6 col-xs-12 bd-3 p-0 " style=" height:300px; overflow: hidden">
                <div class="owl-carousel" data-plugin-options='{"autoPlay": 3000}' style="height:100%">
                <?php for ($i=0; $i < count($data['img']); $i++) { 
                ?>
                  <div class="item">
                    <img src="<?php echo $data['img'][$i];?>" alt="ecommerce" class="img-responsive">
                  </div>
                <?php }?>
                </div>
          </div>
          <div class="col-md-6 col-sm-6 bg-white col-xs-12 boxshadow p-t-60 p-b-60">
            <h2 class="section-title"><?php echo  $data['dish']['name']?></h2>
            <!--<div class="rateit p-20" data-rateit-value="2.5" data-rateit-resetable="false" data-rateit-readonly="true"></div>-->
          </div>
        </div>
        <div class="row m-t-40">
          <div class="col-md-8 col-sm-8 p-0 col-sm-12 justify pappear">
              <p class="section-title m-t-40">location : <?php echo  $data['dish']['adresse']?></p>
              <p><?php echo  $data['dish']['desc']?></p>
              <?php 
                  $datetimebegin = new DateTime($data['dish']['begin']);
                  $datetimefinish = new DateTime($data['dish']['finish']);
                  $datetimerecherche = new DateTime($data['date']['date']);
                  if(($datetimerecherche<$datetimefinish)&&($datetimerecherche>$datetimebegin)){
                ?>
              <p class="c-orange">Offer valid until <?php echo  $data['dish']['finish']?></p>
              <?php }?>
              <a href="<?php echo $data['img'][0];?>" data-lightbox-gallery="gallery1"   class="allDishPictures btn btn-purple btn-transparent m-t-20">See all pictures</a>
              <?php for ($i=1; $i < count($data['img']); $i++) { 
                ?>
              <a href="<?php echo $data['img'][$i];?>" style="display:none" data-lightbox-gallery="gallery1" class="allDishPictures">
                  <img src="<?php echo $data['img'][$i];?>" alt="" />
              </a>
              <?php }?>
          </div>
          <div class="col-md-4 col-sm-4 p-0">
            <div class="row">
              <div class="col-md-10 col-md-offset-2 p-40 p-t-0">
                <?php 
                  $datetimebegin = new DateTime($data['dish']['begin']);
                  $datetimefinish = new DateTime($data['dish']['finish']);
                  $datetimerecherche = new DateTime($data['date']['date']);
                  if(($datetimerecherche<$datetimefinish)&&($datetimerecherche>$datetimebegin)&&($data['dish']['quantity']!=0)){
                ?>
                <div class=" row border-green boxshadow t-center p-b-20 bd-6">
                  <div class=" col-md-6 col-sm-6 col-xs-6 border-bottom p-10 m-t-0 t-left" style="background-color:#87D37C;height: 70px;">
                    <h5 class="title-note-section"><?php echo  $data['dish']['price']?> €</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 border-bottom p-20 m-t-0" style="background-color:#87D37C; height: 70px;">
                    <p class="t-right">for a dish</h5>
                  </div>

                  <div class="p-20 col-md-12">
                    <table class="table table-bordered">
                      <tbody>
                      <tr>
                        <td><span id="dishpricepayment"><?php echo  $data['dish']['price']?></span> € x 
                          <select id="selectquantitypayment">
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
                    <button onclick="addcart(<?php echo $_GET['id'];?>,'<?php echo  $data['dish']['name']?>',<?php echo  $data['dish']['price']?>,'<?php echo $_GET['date'];?>')"  class="btn btn-purple btn-transparent">Proceed to payment</button>
                  </div>
                  
                </div>
                <?php }else{ ?>
                <div class=" row border-purple boxshadow t-center p-b-20 bd-6">
                    <h5 class="title-note-section m-t-40 m-b-20 c-purple">This dish is <br>not available</h5>
                </div>
                <?php }?>
              </div>
          </div>
        </div>
      </div>
  </section>

  <section>
    <div class="container p-0 m-b-100">
      <div class="row row-eq-height">
        <div class="col-md-6 m-r-20 m-l-20 col-sm-12 p-20 col-sm-12 justify border-yellow boxshadow t-center">
          <h5 class="title-note-section border-bottom p-10">Ingredients</h5>
          <div class="m-t-20 m-b-40" style="overflow: hidden">
            <ul class="list-two" >
              <?php 
              $theingrdient = explode(",",$data['dish']['ingredient']);
              for ($i=0; $i < count($theingrdient); $i++) { ?>
              <li class="ingredientli"><?php echo $theingrdient[$i]?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-6 m-r-20 m-l-20 col-sm-12 p-0 border-yellow boxshadow t-center MapDish">
          <h5 class="title-note-section border-bottom p-10 m-b-0">Localisation</h5>
          <div class="map TheMapDish" id="my-map"></div>
        </div>
      </div>
    </div>
  </section>

  <?php include('layout/footer.php'); ?>
