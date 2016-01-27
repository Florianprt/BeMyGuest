/* 
*
* Close alert message
*
*/

$(document).on('click', '.closealert', function () {
    $(this).parent().fadeOut();
});

/**
*
* Load image preview 
*
*/
function loadImg(thislink, thislinkencoded, thisname, thisID){

    $(".vfm-zoom").html("<i class=\"fa fa-refresh fa-spin\"></i><img class=\"preimg\" src=\"vfm-thumb.php?thumb="+ thislink +"\" \/>");
    $("#zoomview .thumbtitle").html(thisname);
    $("#zoomview").data('id', thisID);

    var firstImg = $('.preimg');
    firstImg.css('display','none');

    $("#zoomview").modal();

    firstImg.one('load', function() {
        $(".vfm-zoom .fa-refresh").fadeOut();
        $(this).fadeIn();
        checkNextPrev(thisID);
        $(".vfmlink").attr("href", "vfm-admin/vfm-downloader.php?q="+thislinkencoded);
        }).each(function() {
            if(this.complete) $(this).load();
    });   
}

/**
*
* Call image preview 
*
*/
$(document).on('click', 'a.thumb', function(e) {
    e.preventDefault();
    $(".navigall").remove();
    var thislink = $(this).data('link');
    var thislinkencoded = $(this).data('linkencoded');
    var thisname = $(this).data('name');
    var thisID = $(this).parents('.rowa').attr('id');

    loadImg(thislink, thislinkencoded, thisname, thisID);
});


jQuery.fn.firstAfter = function(selector) {
    return this.nextAll(selector).first();
};
jQuery.fn.firstBefore = function(selector) {
    return this.prevAll(selector).first();
};

/**
*
* Quick image preview gallery navigation
*
*/
function checkNextPrev(currentID){

    var current = $('#'+currentID);
    var nextgall = current.firstAfter('.gallindex').find('.vfm-gall');
    var prevgall = current.firstBefore('.gallindex').find('.vfm-gall');

    if (nextgall.length > 0){

        var nextlink = nextgall.data('link');  
        var nextlinkencoded = nextgall.data('linkencoded');
        var nextname = nextgall.data('name');
        var nextID = current.firstAfter('.gallindex').attr('id');

        if ($('.nextgall').length < 1) {
            $(".vfm-zoom").append('<a class="nextgall navigall"><i class="fa fa-angle-right"></i></a>');
        }
        $(".nextgall").data('link', nextlink)
        $(".nextgall").data('linkencoded', nextlinkencoded)
        $(".nextgall").data('name', nextname)
        $(".nextgall").data('id', nextID)
    } else {
        $(".nextgall").remove();
    }

    if (prevgall.length > 0){

        var prevlink = prevgall.data('link');  
        var prevlinkencoded = prevgall.data('linkencoded');
        var prevname = prevgall.data('name');
        var prevID = current.firstBefore('.gallindex').attr('id');

        if ($('.prevgall').length < 1) {
            $(".vfm-zoom").append('<a class="prevgall navigall"><i class="fa fa-angle-left"></i></a>');
        }
        $(".prevgall").data('link', prevlink)
        $(".prevgall").data('linkencoded', prevlinkencoded)
        $(".prevgall").data('name', prevname)
        $(".prevgall").data('id', prevID)
    } else {
        $(".prevgall").remove();
    }
}
/**
*
* navigate through image preview gallery
*
*/
$(document).on('click', 'a.navigall', function(e) {
    var thislink = $(this).data('link');
    var thislinkencoded = $(this).data('linkencoded');
    var thisname = $(this).data('name');
    var thisID = $(this).data('id');
    $(".navigall").remove();

    loadImg(thislink, thislinkencoded, thisname, thisID);
});

$('body').keydown(function(e) {

    if(e.keyCode == 39 && $('.nextgall').length > 0) { // right
        var thislink = $('.nextgall').data('link');
        var thislinkencoded = $('.nextgall').data('linkencoded');
        var thisname = $('.nextgall').data('name');
        var thisID = $('.nextgall').data('id');
        $(".navigall").remove();

        loadImg(thislink, thislinkencoded, thisname, thisID);
    }

    if(e.keyCode == 37 && $('.prevgall').length > 0) { // left
        var thislink = $('.prevgall').data('link');
        var thislinkencoded = $('.prevgall').data('linkencoded');
        var thisname = $('.prevgall').data('name');
        var thisID = $('.prevgall').data('id');
        $(".navigall").remove();

        loadImg(thislink, thislinkencoded, thisname, thisID);
    }
});

$('#zoomview').on('hidden.bs.modal', function () {
   $(".navigall").remove();
})
/**
*
* Rename file and folder 
*
*/
$(document).on('click', '.rename a', function () {

    var thisname = $(this).data('thisname');
    var thisdir = $(this).data('thisdir');
    var thisext = $(this).data('thisext');

    $("#newname").val(thisname);
    $("#oldname").val(thisname);

    $("#dir").val(thisdir);
    $("#ext").val(thisext);
    $("#modalchangename").modal();
});


/** 
* 
* User panel 
*
*/
$(document).on('click', '.edituser', function () {

    var thisname = $(this).data('thisname');
    var thisdir = $(this).data('thisdir');
    var thisext = $(this).data('thisext');

    $("#newname").val(thisname);
    $("#oldname").val(thisname);

    $("#dir").val(thisdir);
    $("#ext").val(thisext);
});

/**
*
* password confirm
*
*/
$("#usrForm").submit(function(e){

    if($("#oldp").val().length < 1) {
        $("#oldp").focus();
        e.preventDefault();
    }

    if($("#newp").val() != $("#checknewp").val()) {
        $("#checknewp").focus();
        e.preventDefault();
    }
});

/**
*
* password reset 
*
*/
$("#rpForm").submit(function(e){

    if($("#rep").val().length < 1) {
        $("#rep").focus();
        e.preventDefault();
    }

    if($("#rep").val() != $("#repconf").val()) {
        $("#repconf").focus();
        e.preventDefault();
    }
});

/**
*
* add mail recipients (file sharing) 
*
*/
$(document).on('click', '.shownext', function () {
    if ($(this).prev().val().length > 5) {
        $(this).fadeOut(300,function(){
            $(this).parent().next().fadeIn();
        });
    }
});

/**
*
* change input value on select files
*
*/
$(document).on('change', '.btn-file :file', function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
});

/**
*
* Check - Uncheck all
*
*/
$(document).on('click', '#selectall', function () {
    $('.selecta').prop('checked',!$('.selecta').prop('checked'));
});