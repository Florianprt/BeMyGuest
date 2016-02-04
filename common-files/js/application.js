        var topnav           = $('.topnav');
        var topnavHeight     = topnav.height();

$(document).ready(function() {

    //navbarScroll(topnav, topnavHeight);
  
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

    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });




    /* Navbar Height / Background on Scroll */
    function navbarScroll(topnav, topnavHeight) {
        var topScroll = $(window).scrollTop();
        if (topnav.length > 0) {
            if(topScroll >= topnavHeight) {
                topnav.removeClass('topnav-top');
                if(!topnav.hasClass('bg-black') && !topnav.hasClass('no-transparent')) topnav.removeClass('transparent');
            } else {
                topnav.addClass('topnav-top');
                if(!topnav.hasClass('bg-black') && !topnav.hasClass('no-transparent')) topnav.addClass('transparent');
            }
        }
    };

/********** Page dish ***************/
    $( "#selectquantitypayment" ).change(function() {
        var nombre = $(this).val();
        var price = $( "#dishpricepayment" ).text();
        $('#changenewprice').text(nombre*price);
        $('#priceservicefee').text((nombre*price)*15/100);
        $('#pricetotal').text(((nombre*price)*15/100)+(nombre*price));
    });
/********** Page dish ***************/

