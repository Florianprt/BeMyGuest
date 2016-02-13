$(document).ready(function() {

    $( "#formwhere" ).on( "click", function() {
        $( "#nearhere" ).fadeIn();
    });

    $( "#nearhereinside" ).on( "click", function() {
        $( "#nearhere" ).fadeOut();
        $('#formwhere').val($("#nearhereinside").html());
    });

    $( "#formwhere" ).on("focusout",function() {
        $( "#nearhere" ).fadeOut();
    });

    $( "#valueform" ).change(function() {
      $( "#nearhere" ).fadeOut();
      var value = 'after';
      var thevalue = $("#valueform").val();

        if (value == thevalue) {
            $( "#dateform" ).hide();
            $( "#calendarform" ).show();
            $( "#datepicker" ).focus();
        }
    });

    $('#datepicker').datepicker({ minDate: 0 });

    $('.allDishPictures').nivoLightbox({
        effect: 'fade',                             // The effect to use when showing the lightbox
        theme: 'default',                             // The lightbox theme to use
        keyboardNav: true,                             // Enable/Disable keyboard navigation (left/right/escape)
        clickOverlayToClose: true,                    // If false clicking the "close" button will be the only way to close the lightbox
        onInit: function(){},                         // Callback when lightbox has loaded
        beforeShowLightbox: function(){},             // Callback before the lightbox is shown
        afterShowLightbox: function(lightbox){},     // Callback after the lightbox is shown
        beforeHideLightbox: function(){},             // Callback before the lightbox is hidden
        afterHideLightbox: function(){},             // Callback after the lightbox is hidden
        onPrev: function(element){},                 // Callback when the lightbox gallery goes to previous item
        onNext: function(element){},                 // Callback when the lightbox gallery goes to next item
        errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
    });
    
    $( ".opencontact" ).on( "click", function() {
        $( ".help" ).trigger( "click" );
        PopupContactUs();
    });

});

    function deletepanier(){
        simpleCart.empty();
        window.location.href = "";
    }


    $( ".goToDishSection" ).click(function() {
        $("html, body").animate({
            scrollTop: $('#SectionDishProfil').offset().top 
        }, 1000);
    });

    $( ".goToRecoSection" ).click(function() {
        $("html, body").animate({
            scrollTop: $('#SectionRecoProfil').offset().top 
        }, 1000);
    });



    