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

    

});

    