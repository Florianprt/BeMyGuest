//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//

/*******************************/
/*********** DBT Numeric Stepper
/*******************************/
function numericStepper(){
    if ($('.numeric-stepper').length && $.fn.TouchSpin) {
        $('.numeric-stepper').each(function () {
            $(this).TouchSpin({
                min: $(this).data('min') ? $(this).data('min') : 0,
                max: $(this).data('max') ? $(this).data('max') : 100,
                step: $(this).data('step') ? $(this).data('step') : 0.1,
                decimals: $(this).data('decimals') ? $(this).data('decimals') : 0,
                boostat: $(this).data('boostat') ? $(this).data('boostat') : 5,
                maxboostedstep: $(this).data('maxboostedstep') ? $(this).data('maxboostedstep') : 10,
                verticalbuttons: $(this).data('vertical') ? $(this).data('vertical') : false,
                buttondown_class: $(this).data('btn-before') ? 'btn btn-' + $(this).data('btn-before') : 'btn btn-default',
                buttonup_class: $(this).data('btn-after') ? 'btn btn-' + $(this).data('btn-after') : 'btn btn-default',
            });
        });
    }
}
/*******************************/
/*********** FIN Numeric Stepper
/*******************************/


        $( ".changedish" ).on( "click", function() {
            var id = $(this).attr('id');
            $('.afermer').hide();
            $('#part_'+id).fadeIn(  function() {
                $('html,body').animate({
                    scrollTop: $("#part_"+id).offset().top},
                'slow');
            });
        });

        $( ".cancelchangedate" ).on( "click", function() {
            var id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().attr('id');
            $('#'+id).hide();
        });
        $( ".cancelfooterdish" ).on( "click", function() {
            var id = $(this).parent().parent().parent().parent().attr('id');
            console.log(id);
            $('#'+id).hide();
        });

            