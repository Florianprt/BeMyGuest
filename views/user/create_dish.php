
      <!-- Debut haut de la page header en blanc -->
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12 col-sm-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Oh Hello <?php echo $data['personnal_information']['first_name']?>,<br>thank's very much, you want to propose a cook?<br> Lot of people will be very happy ...<br>If your dish was already create you can re-post it when you click on your dish on the section See all dish </h3>
                </div>
              </div>


              <div class="panel p-20">
                <div class="tab-pane" id="validation">
                  <form class="wizard wizard-validation insertdish" data-style="sea" role="form" method="post" action="<?php echo BASE.'user/createdish/'; ?>" autocomplete="off" enctype="multipart/form-data">
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
                            <input id="namedish" type="texte" class="form-control form-white" name="name" placeholder="Enter name" required data-parsley-group="block0" >
                          </div>
                          <div class="form-group">
                            <label for="where">Adress</label>
                            <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="where the people can come to take your dish" data-original-title="Where ?"></i>
                            <input type="texte" class="form-control form-white" name="adress" placeholder="Where ?" required data-parsley-group="block0" >
                          </div>
                          <div class="col-md-6 form-group p-l-0">
                            <label for="where">City</label>
                            <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                            <input type="texte" class="form-control form-white" name="city" placeholder="Wich city ?" required data-parsley-group="block0" >
                          </div>
                          <div class="col-md-6 form-group p-r-0">
                            <label for="where">Zip code</label>
                            <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="the city where the people can come to take your dish" data-original-title="Where ?"></i>
                            <input name="zipcode" type="text" data-mask="99999" class="form-control form-white" placeholder="Write our zip code" required data-parsley-group="block0" >
                          </div>
                          <div class="form-group">
                            <label>Dish Ingredients</label>
                              <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="very important, please press enter after ever elements!" data-original-title="Ingredients ?"></i>
                              <input class="select-tags form-control form-white" name="ingredients" placeholder="Ingredients ?" required data-parsley-group="block0" >
                          </div>
                          <div class="form-group col-md-6 p-l-0">
                            <label for="dishquantity">Dish quantity</label>
                            <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="The quantity of portion" data-original-title="Dish quantity"></i>
                            <input type="text" value="<?php echo $dishquantity ?>" data-step="1" class="numeric-stepper form-control form-white" name="quantity"/>
                          </div>
                          <div class="form-group col-md-6 p-r-0">
                            <label for="dishquantity">Dish price</label>
                            <i class="icon-info m-l-30" rel="popover" data-container="body" data-toggle="popover" data-placement="right" data-content="just for one portion" data-original-title="Dish price"></i>
                            <input data-parsley-type="number" class="form-control form-white"  name="price" placeholder="Price ?" required data-parsley-group="block0" data-parsley-min="0" >
                          </div>
                          <div class="form-group">
                            <label for="Namedish">Description of the dish</label>
                            <textarea type="text" name="description" class="form-control form-white" placeholder="Enter name" style="height: 120px" required data-parsley-group="block0"></textarea>
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
          </div>

          <?php include('layout/footer.php'); ?>
       