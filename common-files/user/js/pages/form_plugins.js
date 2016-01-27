$(function() {

    /**** DATE AND TIME PLUGINS ****/

    /* BASIC USAGE */
    var startDateTextBox = $('#inline_datetimepicker');
    var endDateTextBox = $('#inline_datetimepicker_2');

    startDateTextBox.datetimepicker({ 
        altField: "#inline_datetimepicker_alt",
        dateFormat: 'yy-mm-dd',
        altFieldTimeOnly: false,
        minDate: new Date(),
        onSelect: function (selectedDateTime){
            endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
        }
    });
    endDateTextBox.datetimepicker({
        altField: "#inline_datetimepicker_2_alt",
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
        altFieldTimeOnly: false,
        isRTL: $('body').hasClass('rtl') ? true : false
    });
    /* FINISH BASIC USAGE */
                                                
});             




