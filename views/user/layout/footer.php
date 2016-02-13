          <div class="footer" >
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span><a href="#" rel="nofollow" target="_blank"> BE MY GUEST</a></span>.
              </p>

              <!--
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
              -->
              
            </div>
          </div>

        </div>
      </section>



    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 

    <script src="common-files/user/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="common-files/user/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="common-files/user/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="common-files/user/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="common-files/user/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="common-files/user/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="common-files/user/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="common-files/user/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="common-files/user/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="common-files/user/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="common-files/user/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="common-files/user/js/builder.js"></script> <!-- Theme Builder -->
    <script src="common-files/user/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->

    <script src="common-files/user/js/application.js"></script> <!-- Main Application Script -->
    <script src="common-files/user/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>

    <!-- BEGIN PAGE SCRIPT -->
    <script src="common-files/user/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
    <script src="common-files/user/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="common-files/user/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="common-files/user/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <!-- BEGIN Create Dish -->
    <script src="common-files/user/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
    <script src="common-files/user/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="common-files/user/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="common-files/user/js/pages/form_wizard.js"></script>
    <script src="common-files/user/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="common-files/user/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->
    <script src="common-files/user/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->
    
    <script src="common-files/user/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="common-files/user/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <!-- End Create Dish -->
    <script src="common-files/user/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="common-files/user/js/pages/table_dynamic.js"></script>

    <!-- END PAGE SCRIPT -->
    <script src="common-files/user/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
    <script src="common-files/user/js/layout.js"></script>
    <script src="common-files/user/js/pages/form_plugins.js"></script>
    <script src="common-files/user/js/custom.js"></script>
    <script src="common-files/js/ajaxpopup.js"></script>
    <script src="common-files/js/facebookconnect.js"></script>


    <?php if (isset($data['pages_notifs']['notifs'])) {?>
    <script type="text/javascript">
        notifContent = '<?php echo $data['pages_notifs']['notifs'] ?>';
        generateNotifDashboard(notifContent);
        function generateNotifDashboard(content) {
        var position = 'topRight';
        if ($('body').hasClass('rtl')) position = 'topLeft';
        var n = noty({
            text: content,
            type: 'success',
            layout: position,
            theme: 'made',
            animation: {
                open: 'animated bounceIn',
                close: 'animated bounceOut'
            },
            timeout: 4500,
            callback: {
                onShow: function() {
                    $('#noty_topRight_layout_container, .noty_container_type_success').css('width', 350).css('bottom', 10);
                },
                onCloseClick: function() {
                    setTimeout(function() {
                        $('#quickview-sidebar').addClass('open');
                    }, 1000)
                }
            }
        });
    }
    </script>
    <?php }?>


    <?php 
    if ((isset($data['pages_info']['page']))&&($data['pages_info']['page']=="dish")) {
        for ($i=0; $i < count($iddish) ; $i++) { 
            if ($tabdatefinish[$i]<$now) {
                $hbegin[$i]= $now->format('H');
                $mbegin[$i]= $now->format('i');
            }
    ?>
    <script>
        var id = <?php echo $iddish[$i];?>;
        /* CHANGING USAGE */
        var startDateTextBox = $('#inline_datetimepicker'+id);
        var endDateTextBox = $('#inline_datetimepicker_2'+id);
        startDateTextBox.datetimepicker({ 
            altField: "#inline_datetimepicker_alt"+id,
            dateFormat: 'yy-mm-dd',
            defaultDate: '<?php echo $tabdatebegin[$i]?>',
            hour: <?php echo $hbegin[$i];?>,
            minute: <?php echo $mbegin[$i];?>,
            altFieldTimeOnly: false,
            minDate: new Date(),
            onSelect: function (selectedDateTime){
                endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
            }
        });
        endDateTextBox.datetimepicker({
            altField: "#inline_datetimepicker_2_alt"+id,
            dateFormat: 'yy-mm-dd',
            defaultDate: '<?php echo $tabdatefinish[$i]?>',
            hour: <?php echo $hfinish[$i];?>,
            minute: <?php echo $mfinish[$i];?>,
            minDate: new Date(),
            altFieldTimeOnly: false,
            isRTL: $('body').hasClass('rtl') ? true : false
        });

    </script>
    <?php }} ?>


  </body>
</html>


