        var topnav           = $('.topnav');
        var topnavHeight     = topnav.height();

$(document).ready(function() {

    navbarScroll(topnav, topnavHeight);
  
  	if($.fn.select2){
        $('select:not(.select-picker)').each(function(){
            $(this).select2({
                placeholder: $(this).data('placeholder') ?  $(this).data('placeholder') : '',
                allowClear: $(this).data('allowclear') ? $(this).data('allowclear') : true,
                minimumInputLength: $(this).data('minimumInputLength') ? $(this).data('minimumInputLength') : -1,
                minimumResultsForSearch: $(this).data('search') ? 1 : -1,
                dropdownCssClass: $(this).data('style') ? 'form-white' : ''
            });
        });
    }

    if($('.select-picker').length && $.fn.selectpicker){
        $('.select-picker').selectpicker();
    }


});


/********** TO SCROLL ***************/

$(window).scroll(function() {
    navbarScroll(topnav, topnavHeight);

});




    /* Navbar Height / Background on Scroll */
    function navbarScroll(topnav, topnavHeight) {
        var topScroll = $(window).scrollTop();
        if (topnav.length > 0) {
            if(topScroll >= topnavHeight) {
                topnav.removeClass('topnav-top');
                if(!topnav.hasClass('bg-black') && !topnav.hasClass('bg-white')) topnav.removeClass('transparent');
            } else {
                topnav.addClass('topnav-top');
                if(!topnav.hasClass('bg-black') && !topnav.hasClass('bg-white')) topnav.addClass('transparent');
            }
        }
    };