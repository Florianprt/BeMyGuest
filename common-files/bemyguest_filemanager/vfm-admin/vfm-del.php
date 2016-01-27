<?php
/**
 * VFM - veno file manager remover
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
require_once 'config.php';
require_once 'users.php';
require_once 'class.php';
require_once 'remember.php';

$cookies = new Cookies();
$encodeExplorer = new EncodeExplorer();
$encodeExplorer->init();
$gateKeeper = new GateKeeper();
$gateKeeper->init();

$setUp = new SetUp();
$timeconfig = $setUp->getConfig('default_timezone');
$timezone = (strlen($timeconfig) > 0) ? $timeconfig : "UTC";
date_default_timezone_set($timezone);

$downloader = new Downloader();
$utils = new Utils();
$logger = new Logger();
$actions = new Actions();

$getcloud = filter_input(INPUT_GET, "d", FILTER_SANITIZE_STRING);
$hash = filter_input(INPUT_GET, "h", FILTER_SANITIZE_STRING);
$doit = filter_input(INPUT_POST, "doit", FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_GET, "t", FILTER_SANITIZE_STRING);
if ($doit != ($time * 12)) {
    die('Direct access not permitted');
}
$alt = $setUp->getConfig('salt');
$altone = $setUp->getConfig('session_name');

if ($getcloud && $hash && $time
    && $gateKeeper->isUserLoggedIn() 
    && $gateKeeper->isAllowed('delete_enable')
) {
    
    if (md5($alt.$time) === $hash
        && $downloader->checkTime($time) == true
    ) {

        $cloudfiles = urldecode($getcloud);
        $pieces = explode(",", $cloudfiles);

        foreach ($pieces as $pezzo) {
            if ($downloader->checkFile($pezzo) == true) {
                $myfile = "../".urldecode(base64_decode($pezzo));
                $actions->deleteMulti($myfile);
            }
        }
        echo "ok";
    } else {
        echo "Action expired";
    }
} else {
    echo "Not enough data";
}