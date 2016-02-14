
    <?php include('layout/nav.php'); ?>
      <!-- Fin haut de la page header en blanc -->

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-app mailbox" style="position:fixed">
          <section class="app">
            <aside class="aside-md emails-list">
              <section>
                <div class="mailbox-page clearfix m-b-0">
                  <h1 class="pull-left">Inbox</h1>
                </div>
                <ul class="nav nav-tabs text-right">
                  <li class="active f-right"><a href="#recent" data-toggle="tab">Recent</a></li>
                </ul>
                <div class="tab-content">


                  <div class="tab-pane fade in active" id="recent">
                    <div class="messages-list withScroll show-scroll" data-padding="180" data-height="window">
                      <?php 
                        foreach ($data['function']['resa'] as $item ) {
                        $nameplat = $item['dishname'];
                        $idresa = $item['id'];
                        $dateresa = $item['date_for'];
                        $idun = $item['id_user'];
                        if ($idun == $data['personnal_information']['id']) {
                          $idfrom= $item['id_saler'];
                        }
                        else{
                          $idfrom = $item['id_user'];
                        }

                          $getinfoFrom = $data['function']['user']->getById($idfrom);
                          foreach ($getinfoFrom as $items) {
                            $namefrom = $items['nom'].' '.$items['prenom'];
                          }
                          $getmessage = $data['function']['msg']->getmessage($idresa);
                          $i=0;
                          foreach ($getmessage as $item ) {
                            $i++;
                          }
                      ?>
                      <div class="message-item media" data-id="<?php echo $idresa;?>">
                        <div class="media">
                          <img src="" alt="avatar 3" width="40" class="sender-img">
                          <div class="media-body">
                            <div class="sender"> <?php echo $namefrom; ?></div>
                            <div class="subject"><?php if ($i==0) {?><span class="label label-danger">0</span><?php } else{ ?><span class="label label-success">1</span><?php } ?><span class="subject-text"><?php echo $nameplat; ?></span></div>
                            <div class="date">for <?php echo $dateresa; ?></div>
                            <div class="email-content">

                            <?php
                              foreach ($getmessage as $item ) {
                                $idwriter = $item['idbmg_user'];
                                $datemsg = $item['datemsg'];
                                $themessage = $item['themessage'];
                            ?>
                              <blockquote class="blue" <?php if ($data['personnal_information']['id']== $idwriter) { echo 'style=" border-left: 5px solid #763568"'; } else{ echo 'style=" border-left : 0px;border-right: 5px solid #ee6416"';} ?>>
                                <p><strong><?php echo $themessage ; ?></strong></p>
                              </blockquote>
                            <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </section>
            </aside>


            <div class="email-details">


            <?php




            ?>
            <!-- last message-->
              <section>
                <div class="email-subject">
                  <h1>Name Dish</h1>
                  <div class="clearfix">
                    <div class="go-back-list"><i data-rel="tooltip" data-placement="bottom" data-original-title="Back to email list" class="icon-arrow-left"></i></div>
                    <p>from <strong><span class="sender">Sandra Merlin</span></strong> &bull; <span class="date">16 January, 4:04pm</span></p>
                  </div>
                </div>
                <div class="email-details-inner withScroll" data-height="window" data-padding="200">
                  <div class="email-content">
                    <p>Hi <?php echo $data['personnal_information']['first_name'] ?>,</p>
                    <blockquote class="blue" style=" border-left: 5px solid #763568">
                      <p><strong>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works.</strong></p>
                    </blockquote>
                    <blockquote class="blue" style=" border-left:0px;   border-right: 5px solid #ee6416;">
                      <p><strong>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works.</strong></p>
                    </blockquote>
                  </div>
                  <div class="answers">
                    <div class="answer-subject">
                      <h2 class="answer-title"></h2>
                      <p>from <strong>me</strong> &bull; <span class="answer-date"></span></p>
                    </div>
                    <div class="answer-content"></div>
                  </div>
                  <div class="write-answer">
                    <form method="post" action="<?php echo BASE.'user/message/'; ?>" autocomplete="off" enctype="multipart/form-data">
                      <textarea class="m-t-20" style="width:100%; min-height: 100px " name="msg" required></textarea>
                      <input class="valIdResa" type="hidden" name="idresa"></input>
                      <button type="submit" class="btn btn-primary" type="button" name="send">Send</button>
                    </form>
                  </div>
                </div>
              </section>
              <!-- fin last message-->


            </div>
          </section>
          <?php include('layout/footer.php'); ?>
        