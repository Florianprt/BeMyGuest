

<section  class="m-t-40 footer" style="height: 150px; width: 100%; background-color: black"></section>
  	<script src="common-files/plugins/jquery/jquery-1.11.1.min.js"></script>
  	<script src="common-files/plugins/jquery/jquery-ui.min.js"></script>
  	<script src="common-files/js/ajaxpopup.js"></script>
  	<script src="common-files/js/application.js"></script>
  	<script src="common-files/plugins/magnific/jquery.magnific-popup.js"></script>
  	<script src="common-files/user/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
  	<script src="common-files/plugins/rateit/jquery.rateit.min.js"></script> 
  	<script src="common-files/plugins/owl/owl.carousel.min.js"></script>

  	<!-- BEGIN PAGE SCRIPTS -->
  	<script src="common-files/js/home.js"></script>
  	<script src="common-files/plugins/vide/jquery.vide.min.js"></script>
  	<script src="common-files/plugins/select2/select2.min.js"></script>
  	<!-- END PAGE SCRIPTS -->

  	<script>
  	$(document).ready(function() {
 
  	/* Image Carousel */
    $('.owl-carousel:not(.manual)').each(function() {
        var $this = $(this), opts = null,
        pluginOptions = $this.data('plugin-options'),
        defaults = {
            "autoPlay": 3000,
            "items": 1,
            "singleItem": true,
            "itemsDesktop" : [1199,5],
            "itemsDesktopSmall" : [980,4],
            "itemsTablet": [768,3],
            "itemsMobile" : [479,2],
            "responsive" : true,

        };

        opts = $.extend( {}, defaults, pluginOptions );
        $this.owlCarousel(opts); 
    });

 
	});</script>


  	</body>
</html>



