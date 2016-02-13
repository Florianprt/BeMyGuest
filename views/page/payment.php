  <?php include('layout/header.php'); ?>


  	<section>
	    <div class="container">
	    <h2 class="section-title t-center m-t-40 m-b-40">Your order</h2>
	    	<div class="row row-eq-height">
	      	<div class="col-md-5">
		        <div class="row boxshadow bd-3">
		          	<div class="col-md-12 t-center col-sm-6 bg-white col-xs-12 boxshadow p-60" style="height:100%">
		            <h2 class="section-title"><?php echo $data['dish']['name'];?></h2>
		            <table class="table table-bordered p-40">
	                      <tbody>
	                      <tr>
	                        <td><span id="dishpricepaymentfinal"><?php echo  $data['dish']['price']?></span> € x <span id="thequantityfinal">0</span> dish</td>
	                        <td class="text-right"><span id="changenewpricefinal"><?php echo  $data['dish']['price']?></span> €</td>
	                      </tr>
	                      <tr>
	                        <td>Service fees <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="15% of the dish price" data-original-title="Service fees"></i>
	                        </td>
	                        <td class="text-right" id="servicefeespricefinal"><span id="priceservicefee">0</span> €</td>
	                      </tr>
	                      <tr>
	                        <td>Total</td>
	                        <td class="text-right"><span id="pricetotalfinal" >0</span> €</td>
	                      </tr>
	                    </tbody>
	                </table>
	                <hr class="border-orange">
	                <p>
	                	Reservation for <span><?php echo $_GET['date'];?></span><br>
	                	In <?php echo $data['dish']['adresse'];?>
	                </p>
	                <a href="javascript:deletepanier();">cancel your order</a>
		          	</div>
		        </div>
	      	</div>
	      	<div id="paymentwithnocookie" style="display :none" class="col-md-offset-1 col-md-6 t-center col-sm-6 bg-white col-xs-12 boxshadow p-60">
	      		<h2 class="section-title">The payment</h2>
	      		<button  align="center" class="connexion btn btn-orange btn-transparent m-t-40">Please connect you</button>
	      		<p>Or</p>
	      		<button  align="center" class="inscription btn btn-purple btn-transparent">Create an account</button>
	      	</div>
	      	<div id="paymentwithcookie" style="display :none" class="col-md-offset-1 col-md-6 t-center col-sm-6 bg-white col-xs-12 boxshadow p-60">
	      		<h2 class="section-title">The payment</h2>
	      		<button  align="center" onclick="payplapayment()" class="btn btn-purple btn-transparent m-t-60"><i class="fa fa-paypal f-20 m-b-10"></i><br>Pay with paypal</button>
	      		<p style="bottom:0px;position: absolute;">* if you pay you accept our services and you accept our terme.</p>
	      	</div>
	      	</div>
	    </div>
  	</section>

  <?php include('layout/footer.php'); ?>
