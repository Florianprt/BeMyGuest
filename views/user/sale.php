
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12 col-sm-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Oh Hello <?php echo $data['personnal_information']['first_name']?>,<br>Here you're can find all the dishes that you sold !</h3>
                </div>
              </div>

          <?php if ($data['nbr']['buy']!=0) { ?>
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="fa fa-table"></i>Sale</h3>
                </div>
                <div class="panel-content">
                  <table class="table dataTable" id="table2">
                    <thead>
                      <tr>
                        <th class="no_sort" tabindex="0" rowspan="1" colspan="1" style="width: 42px;"></th>
                        <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 279px;">
                          Dish name
                        </th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                          Date buy
                        </th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                          Reservation Date
                        </th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 322px;">
                          Quantity
                        </th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 241px;">
                          Price
                        </th>
                        <th style="display:none" class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 171px;">
                          Where
                        </th>
                      </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php 
                      foreach ($data['function']['sails'] as $item ) { 
                        $dishname = $item['dishname'];
                        $datebuy = $item['date_buy'];
                        $datefor = $item['date_for'];
                        $quantity = $item['quantity'];
                        $price = $item['price_total'];
                        $where = $item['dishadress'].' , '.$item['dishcity'].' , '.$item['dishzipcode'];
                    ?>
                      <tr class="gradeA odd">
                        <td class="center "></td>
                        <td class=" sorting_1"><?php echo $dishname?></td>
                        <td class=" sorting_1"><?php echo $datebuy?></td>
                        <td class=" "><?php echo $datefor?> </td>
                        <td class=" "><?php echo $quantity?> dishes</td>
                        <td class="center "><?php echo $price?>€</td>
                        <td  style="display:none" class="center "><?php echo $where?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
          <?php } else { ?>
              <div class="panel">
                <div class="panel-header panel-controls t-center" style="padding:80px">
                  <h3>You don't sale any dish</h3>
                  <a href="user/createdish/" class=" btn btn-purple  btn-transparent m-t-40">Click here to create a dish</a>
                </div>
              </div>
          <?php }?>
          </div>

    
          </div>
          <?php include('layout/footer.php'); ?>
        