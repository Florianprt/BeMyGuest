<?php
/**
 * VFM - veno file manager: include/modals.php
 * popup windows and main js functions call
 *
 * PHP version 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2013-2014 Nicola Franchini
 * @license   Regular License http://codecanyon.net/licenses/regular
 * @link      http://filemanager.veno.it/
 */

/**
*
* Group Actions
*
*/
if ($gateKeeper->isAccessAllowed()) {

    $time = time();
    $hash = md5($_CONFIG['salt'].$time);
    $url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url .= $_SERVER['HTTP_HOST'];
    $url .= htmlspecialchars($_SERVER['PHP_SELF']);
    $pulito = dirname($url);
    ?>
        <script type="text/javascript">
            $(document).on('click', '.manda', function () {
                if($(".selecta:checked").size() > 0) {
                    var divar = [];

                    <?php 
    if ($setUp->getConfig("show_pagination_num") == true 
        || $setUp->getConfig("show_pagination") == true 
        || $setUp->getConfig("show_search") == true
    ) { ?>

        var sData = $('.selecta', oTable.fnGetNodes()).serializeArray();
        var numfiles = sData.length;

        jQuery.each( sData, function( i, field ) {
            divar.push(field.value);
        });

        <?php
    } else {
        ?>
        
        var numfiles = $(".selecta:checked").size();
        $(".selecta:checked").each(function(){
            divar.push($(this).val());
        });

        <?php
    } ?>
                    var link = "?d=" + divar + "&t=<?php echo $time;?>&h=<?php echo $hash; ?>";

                    $(".attach").val(divar);
                    $(".numfiles").html(numfiles);
                    $(".sharelink").val('<?php echo $pulito; ?>/'+link);
                    $('#sendfilesmodal').modal();
                    

                    $( "#sendfiles" ).on( "submit", function( event ) {
                        $(".mailpreload").fadeIn();
                        event.preventDefault();
                        var now = $.now();
                        $.ajax({
                            cache: false,
                            type: "POST",
                            url: "vfm-admin/sendfiles.php?t="+now,
                            data: $("#sendfiles").serialize()
                            })
                            .done(function( msg ) {
                                $('.mailresponse').html('<p>' + msg + '</p>').addClass('bg-success');
                                $("#dest").val('');
                                $("#send_cc_1, #send_cc_2, #send_cc_3").val('');
                                $("#send_cc_1, #send_cc_2, #send_cc_3").parent().fadeOut();
                                $(".mailpreload").fadeOut();
                                $(".shownext-first").fadeIn();
                            })
                            .fail(function() {
                                $(".mailpreload").fadeOut();
                                $('.mailresponse').html('<p>Error</p>').addClass('bg-danger');
                        });
                    });
                } else {
                    alert("<?php print $encodeExplorer->getString("select_files"); ?>");
                }
            });

            $(document).on('click', '.multid', function(e) {
                e.preventDefault();
                if($(".selecta:checked").size() > 0) {
                    var divar = [];

                    <?php 
    if ($setUp->getConfig("show_pagination_num") == true 
        || $setUp->getConfig("show_pagination") == true 
        || $setUp->getConfig("show_search") == true
    ) { ?>
                    var sData = $('.selecta', oTable.fnGetNodes()).serializeArray();
                    var numfiles = sData.length;

                    jQuery.each( sData, function( i, field ) {
                        divar.push(field.value);
                    });
        <?php
    } else {
        ?>
                    var numfiles = $(".selecta:checked").size();
                    $(".selecta:checked").each(function(){
                        divar.push($(this).val());
                    });
        <?php
    } ?>
                    var link = "?d=" + divar + "&t=<?php echo $time;?>&h=<?php echo $hash; ?>";

                    $("#downloadmulti .numfiles").html(numfiles);
                    $(".sendlink").attr("href", 'vfm-admin/vfm-downloader.php'+link);
                    $('#downloadmulti').modal();
                } else {
                    alert("<?php print $encodeExplorer->getString("select_files"); ?>");
                }
            });
        </script>

        <div class="modal fade downloadmulti" id="downloadmulti" tabindex="-1">

            <div class="modal-dialog">
                <div class="modal-content">
               
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <p class="modal-title">
                            <?php print " " .$encodeExplorer->getString("selected_files"); ?>: 
                            <span class="numfiles badge badge-danger"></span>
                        </p>
                    </div>

                    <div class="text-center modal-body">
                        <a class="btn btn-primary btn-lg centertext bigd sendlink" href="#">
                            <i class="fa fa-cloud-download fa-5x"></i>
                        </a>
                    </div>
                </div>
             </div>
        </div>

    <?php 
    if ($gateKeeper->isAllowed('delete_enable')) { 
        $doit = ($time * 12);
        ?>
        <script type="text/javascript">
            /* Deletion Confirm */
            $(document).on('click', 'td.del a', function() {
                var answer = confirm("<?php print $encodeExplorer->getString('delete_this_confirm'); ?> \"" + $(this).attr("data-name") + "\"");
                return answer;
            });

            $(document).on('click', '.removelink', function(e) {
                e.preventDefault();
                var linx = $(this).data("linx");
                var answer = confirm("<?php print $encodeExplorer->getString('delete_confirm'); ?>");
                if (answer == true) {
                    $.ajax({
                        type: "POST",
                        url: "vfm-admin/vfm-del.php"+linx,
                        data: { doit:  "<?php echo $doit;?>"  }
                        })
                        .done(function( msg ) {
                            if (msg == "ok") {
                                window.location = window.location.href;
                            } else {
                                $(".delresp").html(msg);
                            }
                        })
                         .fail(function() {
                            alert( 'error' );
                        })
                 } else {
                    return answer;
                 }
            });
            
            $(document).on('click', '.multic', function(e) {
                e.preventDefault();
                if($(".selecta:checked").size() > 0) {
                    var divar = [];

                    <?php 
        if ($setUp->getConfig("show_pagination_num") == true 
            || $setUp->getConfig("show_pagination") == true 
            || $setUp->getConfig("show_search") == true
        ) { ?>
                    var sData = $('.selecta', oTable.fnGetNodes()).serializeArray();
                    var numfiles = sData.length;

                    jQuery.each(sData, function(i, field) {
                        divar.push(field.value);
                    });
        <?php
        } else {
            ?>
                    var numfiles = $(".selecta:checked").size();
                    $(".selecta:checked").each(function(){
                        divar.push($(this).val());
                    });
        <?php
        } ?>
                    var linx = "?d=" + divar + "&t=<?php echo $time;?>&h=<?php echo $hash; ?>";
                    $("#deletemulti .numfiles").html(numfiles);
                    $(".removelink").data("linx",linx);
                    $('#deletemulti').modal();
                } else {
                    alert("<?php print $encodeExplorer->getString("select_files"); ?>");
                }
            });
        </script>

        <div class="modal fade deletemulti" id="deletemulti" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <p class="modal-title">
                            <?php print " " .$encodeExplorer->getString("selected_files"); ?>: 
                            <span class="numfiles badge badge-danger"></span>
                        </p>
                    </div>
                    <div class="text-center modal-body">
                        <a class="btn btn-primary btn-lg centertext bigd removelink" href="#">
                        <i class="fa fa-trash-o fa-5x"></i></a>
                        <p class="delresp"></p>
                    </div>
                </div>
            </div>
        </div>
    <?php  
    } 

    /**
    *
    * Send files window
    *
    */
    if ($setUp->getConfig('sendfiles_enable')) { ?>
            <div class="modal fade sendfiles" id="sendfilesmodal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <p class="modal-title">
                                <?php print " " .$encodeExplorer->getString("selected_files"); ?>: 
                                <span class="numfiles badge badge-danger"></span>
                            </p>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                    <input name="sharelink" class="sharelink form-control" type="text" onclick="this.select()">
                                </div>
                            </div>

        <?php
        $mailsystem = $setUp->getConfig('email_from');
        if (strlen($mailsystem) > 0) { ?>

                            <div class="mailresponse"></div>

                            <form role="form" id="sendfiles">
                                <input name="thislang" type="hidden" 
                                value="<?php print $encodeExplorer->lang; ?>">
                                <div class="form-group clear">
                                    <label for="dest">
                                        <?php print $encodeExplorer->getString("send_to"); ?>:
                                    </label>
                                    <input name="dest" type="email" 
                                    class="form-control" id="dest" placeholder="" required >

                                    <span class="label label-default shownext shownext-first">
                                        <i class="fa fa-plus shownext"></i> <i class="fa fa-user"></i>
                                    </span>

                                </div>

                                <div class="form-group clear" style="display: none;">
                                    <input name="send_cc_1" type="email" 
                                    class="form-control" id="send_cc_1">

                                    <span class="label label-default shownext">
                                        <i class="fa fa-plus shownext"></i> <i class="fa fa-user"></i>
                                    </span>
                                </div>

                                <div class="form-group clear" style="display: none;">
                                    <input name="send_cc_2" type="email" 
                                    class="form-control" id="send_cc_2">
                                    
                                    <span class="label label-default shownext">
                                        <i class="fa fa-plus shownext"></i> <i class="fa fa-user"></i>
                                    </span>
                                </div>

                                <div class="form-group clear" style="display: none;">
                                    <input name="send_cc_3" type="email" 
                                    class="form-control" id="send_cc_3">
                                </div>                    

                                <div class="form-group">
                                    <label for="mitt">
                                       <?php print $encodeExplorer->getString("from"); ?>:
                                    </label>
                                    <input name="mitt" type="email" 
                                    class="form-control" id="mitt" 
                                    placeholder="<?php print $encodeExplorer->getString("your_email"); ?>" required >
                                </div>
                                <input name="attach" class="attach" type="hidden">

                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="mess" rows="3" 
                                    placeholder="<?php print $encodeExplorer->getString("message"); ?>"></textarea>
                                </div>
                                <p>
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-envelope"></i>
                                </button>
                                </p>
                                <input name="sharelink" class="sharelink" type="hidden">
                            </form>

                            <div class="mailpreload"></div>
        <?php
        } ?>
                        </div> <!-- modal-body -->
                    </div>
                </div>
            </div>
        <?php
    }
} 
        
/**
*
* Rename files and folders
*
*/
if ($gateKeeper->isAllowed('rename_enable')) { ?>

    <div class="modal fade changename" id="modalchangename" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> <?php print $encodeExplorer->getString("rename"); ?></h4>
                </div>

                <div class="modal-body">
                    <form role="form" method="post">
                        <input readonly name="thisdir" type="hidden" 
                        class="form-control" id="dir">
                        <input readonly name="thisext" type="hidden"
                        class="form-control" id="ext">
                        <input readonly name="oldname" type="hidden" 
                        class="form-control" id="oldname">

                        <div class="input-group">
                            <label for="newname" class="sr-only">
                                <?php print $encodeExplorer->getString("rename"); ?>
                            </label>
                            <input name="newname" type="text" 
                            class="form-control" id="newname">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">
                                    <?php print $encodeExplorer->getString("rename"); ?>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
*
* Show Thumbnails
*
*/
if ($setUp->getConfig("thumbnails") == true ) { ?>
    <div class="modal fade zoomview" id="zoomview" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <div class="modal-title"><span class="downlink"><a class="vfmlink" href="#">
                        <i class="fa fa-download"></i></a></span> <span class="thumbtitle"></span>
                    </div>
                </div>
                <div class="modal-body vfm-zoom"></div>
            </div>
        </div>
    </div>
    <?php
} ?>