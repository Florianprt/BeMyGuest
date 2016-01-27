<?php
/**
 * VFM - veno file manager upload progress controller
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
require 'config.php';
session_name($_CONFIG["session_name"]);
session_start();
if (isset($_GET['uid'])) {
    if ($_CONFIG['preloader'] == 'APC') {
        // APC //
        $status = apc_fetch('upload_'.$_GET['uid']);
        echo $status['current']/$status['total']*100;
    } else {
        // UPLOAD PROGRESS //
        $status = uploadprogress_get_info($_GET['uid']);
        if ($status) {
            echo $status['bytes_uploaded']/$status['bytes_total']*100;
        } else {
            echo 100;
        }
    }
    exit;
} ?>