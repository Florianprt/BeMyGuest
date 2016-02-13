
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Hi <?php echo $data['personnal_information']['first_name']?> , How are you today ? </h3>
                  <p>We hope every think is ok, are you angry? or maybe you want to cook for somebody today?</p>
                </div>
              </div>
            </div>
          </div>

          <?php 
          $tabdatebegin = array();
          $tabdatefinish = array();
          $iddish = array();
          $hbegin = array();
          $mbegin = array();
          $hfinish = array();
          $mfinish = array();

            foreach($data['function']['dish'] as $item) { 
              $id = $item['idbmg_dish'];
              $dishname = $item['dishname'];
              $dishadress = $item['dishadress'];
              $dishzipcode = $item['dishzipcode'];
              $dishcity = $item['dishcity'];
              $dishingredients = $item['dishingredients'];
              $dishdesc = $item['dishdesc'];
              $dishprice = $item['dishprice'];
              $dishquantity = $item['dishquantity'];
              $dishbuy = $item['dishbuy'];
              $dishbegin = $item['dishbegin'];
              $dishfinish = $item['dishfinish'];
              $dishactive = $item['dishactive'];
              $today = date("Y-m-d H:i:s");

              array_push($tabdatebegin, $dishbegin);
              array_push($tabdatefinish, $dishfinish);
              array_push($iddish, $id);

              $datebegin = new DateTime($dishbegin);
              $datefinish = new DateTime($dishfinish);
              $now = new DateTime();

              array_push($hbegin, $datebegin->format('H'));
              array_push($mbegin, $datebegin->format('i'));
              array_push($hfinish, $datefinish->format('H'));
              array_push($mfinish, $datefinish->format('i'));


              $datebeginin= $datebegin->diff($now)->format("%d days and %h hours");
              $datefinishin= $datefinish->diff($now)->format("%d days and %h hours");
          
          if ($datefinish<$now) {?>

          <div id="part_changedate_<?php echo $id;?>"  style="display:none" class="afermer row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Change the date of your dish</h3>
                </div>
                <div class="panel-content">
                  <form method="post" action="<?php echo BASE.'user/dish/'; ?>" autocomplete="off" >
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="begin" class="col-lg-6 p-30 p-t-0">
                        <div class="form-group">
                          <label class="form-label">Offer begin at</label>
                          <input type="text" id="inline_datetimepicker_alt" class="form-control form-white" name="dishbegin<?php echo $id;?>">
                          <span id="inline_datetimepicker"></span>
                        </div>
                      </div>
                      <div id="finish" class="col-lg-6 p-30 p-t-0">
                        <div class="form-group">
                          <label class="form-label">Offer finish at</label>
                          <input type="text" id="inline_datetimepicker_2_alt" class="form-control form-white" name="dishfinish<?php echo $id;?>">
                          <span id="inline_datetimepicker_2"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-sm-9 col-sm-offset-3">
                      <div class="pull-right">
                        <button id="cancel_changedate_<?php echo $id;?>" type="button" class="cancelchangedate btn btn-white m-r-10">Cancel</button>
                        <button type="submit" name="changedate" value="<?php echo $id;?>" class="btn btn-embossed btn-primary m-r-20">Envoyer</button>
                      </div>
                    </div><!-- fin col sm 9-->
                  </div><!-- fin row -->
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php }?>


          <div id="part_change_dish_<?php echo $id;?>"  style="display:none" class=" afermer row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Change informations of your dish</h3>
                </div>
                <div class="panel-content">
                  <div class="row">
                      <div class="col-md-12">
                        <form class="wizard wizard-validation modifydish" data-style="sea" role="form" method="post" action="<?php echo BASE.'user/dish/'; ?>" autocomplete="off" enctype="multipart/form-data">
                        <fieldset>
                          <legend>Basic information</legend>
                          <div class="row">
                            <div id="dishimage" class="col-lg-6">
                              <div class="col-md-12" style="float: right;">
                                <i class="icon-info m-l-30 m-r-10 p-t-10"style="float:right" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="Active or desactive our news" data-original-title="ON/OFF ?"></i>

                                <div class="onoffswitch" style="float:right">
                                  <input type="checkbox" name="dishactive" value="1" class="onoffswitch-checkbox"  id="myonoffswitch<?php echo $id;?>" <?php if(((isset($dishactive))&&($dishactive==1))||(!isset($dishactive ))){ ?>checked=""<?php } ?>>
                                  <label class="onoffswitch-label" for="myonoffswitch<?php echo $id;?>">
                                  <span class="onoffswitch-inner">
                                  <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                  <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                  </span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-12" >
                                <h3><strong>Dish </strong> image</h3>
                                <div action="<?php echo BASE.'user/dish/'; ?>" class="dropzone">
                                  <div class="fallback">
                                    <input name="file[]" type="file" multiple />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="Namedish">Name of the dish</label>
                                <input id="namedish" type="texte" class="form-control form-white" name="name" placeholder="Enter name" required data-parsley-group="block0" value="<?php if(isset($dishname)){echo $dishname;}?>" >
                              </div>
                              <div class="form-group">
                                <label for="where">Adress</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input type="texte" class="form-control form-white" name="adress" placeholder="Where ?" required data-parsley-group="block0" value="<?php if(isset($dishadress)){echo $dishadress;}?>">
                              </div>
                              <div class="col-md-6 form-group p-l-0">
                                <label for="where">City</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input type="texte" class="form-control form-white" name="city" placeholder="Wich city ?" required data-parsley-group="block0" value="<?php if(isset($dishcity)){echo $dishcity;}?>">
                              </div>
                              <div class="col-md-6 form-group p-r-0">
                                <label for="where">Zip code</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input name="zipcode" type="text" data-mask="99999" class="form-control form-white" placeholder="Write our zip code" required data-parsley-group="block0" value="<?php if(isset($dishzipcode)){echo $dishzipcode;}?>">
                              </div>
                              <div class="form-group">
                                <label>Dish Ingredients</label>
                                  <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="very important, please press enter after ever elements!" data-original-title="Ingredients ?"></i>
                                  <input class="select-tags form-control form-white" name="ingredients" placeholder="Ingredients ?" required data-parsley-group="block0" value="<?php if(isset($dishingredients)){echo $dishingredients;}?>">
                              </div>
                              <div class="form-group col-md-6 p-l-0">
                                <label for="dishquantity">Dish quantity</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="The quantity of portion" data-original-title="Dish quantity"></i>
                                <input value="<?php echo $dishbuy ?>" name="dishbuy" style="display:none">
                                <input type="text" value="<?php echo $dishquantity ?>" data-step="1" class="numeric-stepper form-control form-white" name="quantity"/>
                              </div>
                              <div class="form-group col-md-6 p-r-0">
                                <label for="dishquantity">Dish price</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="just for one portion" data-original-title="Dish price"></i>
                                <input data-parsley-type="number" class="form-control form-white"  name="price" placeholder="Price ?" required data-parsley-group="block0" data-parsley-min="0" value="<?php if(isset($dishprice)){echo $dishprice;}?>">
                              </div>
                              <div class="form-group">
                                <label for="Namedish">Description of the dish</label>
                                <textarea type="text" name="description" class="form-control form-white" placeholder="Enter name" style="height: 120px" required data-parsley-group="block0"><?php if(isset($dishdesc)){echo $dishdesc;}?></textarea>
                              </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <legend>Date</legend>
                          <div class="row">
                            <div class="col-lg-12">
                              <div id="begin" class="col-lg-6 p-30 p-t-0">
                                <div class="form-group">
                                  <label class="form-label">Offer begin at</label>
                                  <input type="text" id="inline_datetimepicker_alt<?php echo $id;?>" class="form-control form-white" name="dishbegin">
                                  <span id="inline_datetimepicker<?php echo $id;?>"></span>
                                </div>
                              </div>
                              <div id="finish" class="col-lg-6 p-30 p-t-0">
                                <div class="form-group">
                                  <label class="form-label">Offer finish at</label>
                                  <input type="text" id="inline_datetimepicker_2_alt<?php echo $id;?>" class="form-control form-white" name="dishfinish">
                                  <span id="inline_datetimepicker_2<?php echo $id;?>"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <legend>Condition</legend>
                          In publishing and graphic design, lorem ipsum is common placeholder text used to demonstrate the graphic elements of a document or visual presentation, such as web pages, typography, and graphical layout. It is a form of "greeking".
                          Even though using "lorem ipsum" often arouses curiosity due to its resemblance to classical Latin, it is not intended to have meaning. Where text is visible in a document, people tend to focus on the textual content rather than upon overall presentation, so publishers use lorem ipsum when displaying a typeface or design in order to direct the focus to presentation. "Lorem ipsum" also approximates a typical distribution of letters in English.
                          <div class="radio">
                            <label>
                            <input type="radio" value="option1" name="condition" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                            Yes, it is totaly right.
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" value="option2" name="condition" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                            No, I check it twice and it is not right.
                            </label>
                          </div>
                          <div id="condition-error"></div>
                            <input name="changedish" value="<?php echo $id;?>" style="display:none">
                        </fieldset>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="cancelfooterdish btn btn-default btn-embossed" >Close</button>
                </div>
              </div>
            </div>
          </div>
          <?php }?>


          <div class="row">
          <?php 
            foreach($data['function']['dish'] as $item) { 
              $id = $item['idbmg_dish'];
              $idperson = $item['bmg_user_idbmg_user'];
              $dishname = $item['dishname'];
              $dishadress = $item['dishadress'];
              $dishzipcode = $item['dishzipcode'];
              $dishcity = $item['dishcity'];
              $dishingredients = $item['dishingredients'];
              $dishdesc = $item['dishdesc'];
              $dishprice = $item['dishprice'];
              $dishquantity = $item['dishquantity'];
              $dishbuy = $item['dishbuy'];
              $dishbegin = $item['dishbegin'];
              $dishfinish = $item['dishfinish'];
              $dishactive = $item['dishactive'];
              $today = date("Y-m-d H:i:s");

            
              $datebegin = new DateTime($dishbegin);
              $datefinish = new DateTime($dishfinish);
              $now = new DateTime();



              $datebeginin= $datebegin->diff($now)->format("%d days and %h hours");
              $datefinishin= $datefinish->diff($now)->format("%d days and %h hours");
          ?>
          
            <div class="col-md-4">
              <div class="panel">
                <figure class="effect-sarah" style="overflow:hidden; height: 200px">
                <?php
                $i=0;
                $dir    = DEFAULT_LINK_FILE.$idperson.'/dish/'.$id;
                $files = scandir($dir);
                for($j=0; $j<count($files); $j++){
                if ($files[$j] != "." && $files[$j]!= ".." && $files[$j]!= ".DS_Store") {
                    $i++;
                    $name=$files[$j];
                    $bon_name[$j]=$name[$j];
                    $bon_name[$j]=str_replace(".jpg","",$bon_name[$j]); ?>
                    <img src="<?php echo $dir.'/'.$name?>" style="width:100%" alt="img04"/>
                <?php }}
                if($i==0){ ?>
                    <img src="<?php echo DEFAULT_LINK_FILE.'default/dish.jpg'?>" style="width:100%" alt="img04"/>
                <?php }?>
                </figure>
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-9"><h2 class="m-t-0"><?php echo $dishname;?></h2></div>
                    <div class="col-md-3"><p class="f-20 t-right <?php if($dishactive==1){echo 'c-green';}else{ echo 'c-red';}?>"><?php if($dishactive==1){echo 'ON';}else{ echo 'OFF';}?></p></div>
                    <div class="col-md-9">
                    <?php if ($datefinish<$now) { ?>
                      <p class="p-t-10 p-b-10 c-red">This dish is finish the <?php echo $dishfinish;?></p>
                    <?php }else{?>
                    <p class="c-green">Start in <?php echo $datebeginin;?> <br>Finish in <?php echo $datefinishin;?></p>
                    <?php }?>
                      <p>Rest  <?php echo $dishquantity;?> quantity</p>
                    </div>
                  </div>
                </div>
                <div class="panel-footer clearfix">
                  <div class="pull-right">
                    <button id="change_dish_<?php echo $id;?>"type="button" class="changedish btn btn-white m-r-10" data-toggle="modal" data-target="#modal-<?php echo $id;?>">Change</button>
                    <?php if ($datefinish<$now) {?>
                    <button id="changedate_<?php echo $id;?>" type="button" class="changedish btn btn-purple ">Repropose</button>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>

            <!--<div class="modal fade modal-topfull" id="modal-<?php echo $id;?>" aria-hidden="true">
              <div class="modal-dialog modal-topfull">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form class="wizard wizard-validation modifydish" data-style="sea" role="form" method="post" action="<?php echo BASE.'user/createdish/'; ?>" autocomplete="off" enctype="multipart/form-data">
                        <fieldset>
                          <legend>Basic information</legend>
                          <div class="row">
                            <div id="dishimage" class="col-lg-6">
                              <div >
                                <h3><strong>Dish </strong> image</h3>
                                <div action="<?php echo BASE.'user/createdish/'; ?>" class="dropzone">
                                  <div class="fallback">
                                    <input name="file[]" type="file" multiple />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="Namedish">Name of the dish</label>
                                <input id="namedish" type="texte" class="form-control form-white" name="name" placeholder="Enter name" required data-parsley-group="block0" value="<?php if(isset($dishname)){echo $dishname;}?>" >
                              </div>
                              <div class="form-group">
                                <label for="where">Adress</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input type="texte" class="form-control form-white" name="adress" placeholder="Where ?" required data-parsley-group="block0" value="<?php if(isset($dishadress)){echo $dishadress;}?>">
                              </div>
                              <div class="col-md-6 form-group p-l-0">
                                <label for="where">City</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input type="texte" class="form-control form-white" name="city" placeholder="Wich city ?" required data-parsley-group="block0" value="<?php if(isset($dishcity)){echo $dishcity;}?>">
                              </div>
                              <div class="col-md-6 form-group p-r-0">
                                <label for="where">Zip code</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                                <input name="zipcode" type="text" data-mask="99999" class="form-control form-white" placeholder="Write our zip code" required data-parsley-group="block0" value="<?php if(isset($dishzipcode)){echo $dishzipcode;}?>">
                              </div>
                              <div class="form-group">
                                <label>Dish Ingredients</label>
                                  <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="very important, please press enter after ever elements!" data-original-title="Ingredients ?"></i>
                                  <input class="select-tags form-control form-white" name="ingredients" placeholder="Ingredients ?" required data-parsley-group="block0" value="<?php if(isset($dishingredients)){echo $dishingredients;}?>">
                              </div>
                              <div class="form-group col-md-6 p-l-0">
                                <label for="dishquantity">Dish quantity</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="The quantity of portion" data-original-title="Dish quantity"></i>
                                <select class="form-control form-white" id="quantity" name="quantity" required data-parsley-group="block0">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                              </div>
                              <div class="form-group col-md-6 p-r-0">
                                <label for="dishquantity">Dish price</label>
                                <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="just for one portion" data-original-title="Dish price"></i>
                                <input data-parsley-type="number" class="form-control form-white"  name="price" placeholder="Price ?" required data-parsley-group="block0" data-parsley-min="0" value="<?php if(isset($dishprice)){echo $dishprice;}?>">
                              </div>
                              <div class="form-group">
                                <label for="Namedish">Description of the dish</label>
                                <textarea type="text" name="description" class="form-control form-white" placeholder="Enter name" style="height: 120px" required data-parsley-group="block0"><?php if(isset($dishdesc)){echo $dishdesc;}?></textarea>
                              </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <legend>Date</legend>
                          <div class="row">
                            <div class="col-lg-12">
                              <div id="begin" class="col-lg-6 p-30">
                                <div class="form-group">
                                  <label class="form-label">Offer begin at</label>
                                  <input type="text" id="inline_datetimepicker_alt" class="form-control form-white" name="dishbegin">
                                  <span id="inline_datetimepicker"></span>
                                </div>
                              </div>
                              <div id="finish" class="col-lg-6 p-30">
                                <div class="form-group">
                                  <label class="form-label">Offer finish at</label>
                                  <input type="text" id="inline_datetimepicker_2_alt" class="form-control form-white" name="dishfinish">
                                  <span id="inline_datetimepicker_2"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <legend>Condition</legend>
                          In publishing and graphic design, lorem ipsum is common placeholder text used to demonstrate the graphic elements of a document or visual presentation, such as web pages, typography, and graphical layout. It is a form of "greeking".
                          Even though using "lorem ipsum" often arouses curiosity due to its resemblance to classical Latin, it is not intended to have meaning. Where text is visible in a document, people tend to focus on the textual content rather than upon overall presentation, so publishers use lorem ipsum when displaying a typeface or design in order to direct the focus to presentation. "Lorem ipsum" also approximates a typical distribution of letters in English.
                          <div class="radio">
                            <label>
                            <input type="radio" value="option1" name="condition" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                            Yes, it is totaly right.
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" value="option2" name="condition" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required>
                            No, I check it twice and it is not right.
                            </label>
                          </div>
                          <div id="condition-error"></div>
                        </fieldset>
                        <fieldset>
                          <legend>Final step</legend>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="row">
                                <div id="showdishimage" class="col-lg-6">
                                </div>
                                <div class="col-lg-6">
                                  <div class="col-md-9"><h2 id="showname">Nom du plat</h2></div>
                                  <div class="col-md-3 m-t-20"><p class="f-30" style="color:#ee6416"><span id="showtheprice"></span> $</p></div>
                                  <div class="col-md-12"> <p id="showadress">2 quai de gesvre 75004 Paris</p></div>

                                  <div class="m-t-20 col-md-12">
                                    <div><p>The ingredients : <span id="showingredients"></span></p></div>
                                    <div><p id="shownumber"></p></div>
                                    <div><p>Description : <span id="showdescription"></span></p></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </form>

                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-embossed btn-lg" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>-->

          <?php } ?>
          </div>

       
          <?php include('layout/footer.php'); ?>
