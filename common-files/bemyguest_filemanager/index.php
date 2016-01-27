<?php
/**
 * VFM - veno file manager index
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
error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once 'vfm-admin/include/head.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php print $setUp->getConfig("appname"); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="<?php print $encodeExplorer->lang; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="vfm-admin/images/favicon.ico">
    <meta name="description" content="file manager">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" href="vfm-admin/css/bootstrap.min.css">
    <?php 
    if ($setUp->getConfig("txt_direction") == "RTL") { ?>
        <link rel="stylesheet" href="vfm-admin/css/bootstrap-rtl.min.css">
    <?php 
    } ?>
    <link rel="stylesheet" href="vfm-admin/vfm-style.css">
    <link rel="stylesheet" href="vfm-admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="vfm-admin/skins/<?php print $setUp->getConfig('skin') ?>">
    <script src="vfm-admin/js/jquery-1.11.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="vfm-admin/js/html5.js" type="text/javascript"></script>
    <script src="vfm-admin/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <script type="text/javascript" src="vfm-admin/js/bootstrap.min.js"></script>

</head>
    <body id="uparea">
        <div class="overdrag"></div>

        <div class="vfmwrapper">
            <?php require_once 'vfm-admin/include/userpanel.php';
            /**
            * ************************************************
            * ******************** HEADER ********************
            * ************************************************
            */ 
            ?>
            <header class="head">
            <?php
            /**
            * ************************************************
            * ******************* Top Banner *****************
            * ************************************************
            */
            if ($setUp->getConfig("show_head") == true ) { ?>
                <a href="?dir="><img alt="<?php print $setUp->getConfig('appname'); ?>" 
                    class="pull-left img-responsive" 
                    src="vfm-admin/images/<?php print $setUp->getConfig('logo'); ?>">
                </a>
            <?php
            } 
            /**
            * ************************************************
            * ****************** Description *****************
            * ************************************************
            */
            if (strlen($setUp->getConfig("description")) > 0 
                && $gateKeeper->isAccessAllowed() && !$getcloud
            ) { 
                $mydesc = nl2br($setUp->getConfig("description"));
                print "<div class=\"description\"><p class=\"lead\">".$mydesc."</p></div>"; 
            }
            ?>
            </header>
            
            <?php         
            /**
            * ************************************************
            * **************** Response messages *************
            * ************************************************
            */
            ?>
            <div id="error">
                <noscript>
                    <div class="response boh">
                        <span><i class="fa fa-exclamation-triangle"></i> 
                            Please activate JavaScript</span>
                    <i class="fa fa-times closealert"></i></div>
                </noscript>
                <?php
                if (isset($_ERROR) && strlen($_ERROR) > 0) {
                    print "<div class=\"response nope\">"
                    .$_ERROR."<i class=\"fa fa-times closealert\"></i></div>";
                }
                if (isset($_WARNING) && strlen($_WARNING) > 0) {
                    print "<div class=\"response boh\">"
                    .$_WARNING."<i class=\"fa fa-times closealert\"></i></div>";
                } 
                if (isset($_SUCCESS) && strlen($_SUCCESS) > 0) {
                    print "<div class=\"response yep\">"
                    .$_SUCCESS."<i class=\"fa fa-times closealert\"></i></div>";
                }
                ?>
            </div>

            <?php 
            if ($getcloud && $time && $hash) :
                /**
                * ************************************************
                * ********* SHOW FILE SHARING DOWNLOADER *********
                * ************************************************
                */
                include_once 'vfm-admin/include/downloader.php'; 

            elseif ($getrp) :
                /**
                * ************************************************
                * **************** PASSWORD RESET ****************
                * ************************************************
                */
                include_once 'vfm-admin/include/reset.php'; 

            else :

                /**
                * ************************************************
                * **************** SHOW FILEMANAGER **************
                * ************************************************
                */
                include_once 'vfm-admin/include/user-redirect.php'; 
                include_once 'vfm-admin/include/uploadarea.php'; 
                include_once 'vfm-admin/include/breadcrumbs.php';  
                include_once 'vfm-admin/include/list-folders.php';
                include_once 'vfm-admin/include/list-files.php'; 
                include_once 'vfm-admin/include/disk-space.php';
                include_once 'vfm-admin/include/login.php';
                include_once 'vfm-admin/include/modals.php'; 

            endif;

                /**
                * ************************************************
                * ******************** FOOTER ********************
                * ************************************************
                */

            ?>
            <footer class="footer">
                <span class="pull-left"><a href="./">
                    <?php print $setUp->getConfig("appname"); ?> </a> 
                    &copy; <?php echo date('Y'); ?>
                </span>

                <!-- credits -->
                <a class="pull-right" title="Built with Veno File Manager" 
                target="_blank" href="http://filemanager.veno.it/">
                <i class="vfmi vfmi-typo"></i></a>
            </footer>
        </div><!-- .wrapper -->

        <script type="text/javascript" src="vfm-admin/js/home.js"></script>
    </body>
</html>