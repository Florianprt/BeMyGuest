
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-8 col-sm-6 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3>Hi <?php echo $data['personnal_information']['first_name']?> , How are you today ? </h3>
                  <p>We hope every think is ok, are you angry? or maybe you want to cook for somebody today?</p>
                </div>
              </div>

              <div class="panel">
                <div class="panel-header">
                  <h3><i class="fa fa-table"></i></h3>
                </div>
                <div class="panel-content">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td> ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Changer ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td> ...</td>
                        <td>1h</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td> ...</td>
                        <td>1h</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6 portlets">
              <div class="widget widget_calendar bg-dark">
                <div class="multidatepicker"></div>
              </div>
            </div>
          </div>
          <?php include('layout/footer.php'); ?>
          