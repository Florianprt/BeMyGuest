<?php
/**
 * VFM - veno file manager: include/head.php
 * main php setup
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
require_once 'vfm-admin/config.php';
require_once 'vfm-admin/users.php';
require_once 'vfm-admin/vfm-icons.php';
require_once 'vfm-admin/class.php';

$resetusr = false;
if (strlen($_CONFIG['session_name']) < 5
    || strlen($_CONFIG['salt']) < 5 
) {
    if (strlen($_CONFIG['session_name']) < 5) {
        $session = "vfm_".strval(mt_rand());
        $_CONFIG['session_name'] = $session;
    }

    if (strlen($_CONFIG['salt']) < 5 
    ) {
        $_CONFIG['salt'] = md5(mt_rand());
    }
    $resetusr = true;
    $con = '$_CONFIG = ';
    file_put_contents(
        'vfm-admin/config.php', "<?php\n\n $con".var_export($_CONFIG, true).";\n"
    );
}

if (strlen($_USERS[0]['pass']) < 1 || $resetusr == true) {
    $reset = crypt($_CONFIG['salt'].urlencode('password'));
    $_USERS[0]['pass'] = $reset;
    $usr = '$_USERS = ';
    file_put_contents(
        'vfm-admin/users.php', "<?php\n\n $usr".var_export($_USERS, true).";\n"
    );
}
global $_ERROR;
global $_WARNING;
global $_SUCCESS;

global $_IMAGES;
global $_USERS;
global $_DLIST;

require_once 'vfm-admin/remember.php';
global $_REMEMBER;
$cookies = new Cookies();

$encodeExplorer = new EncodeExplorer();
$encodeExplorer->init();

require_once 'vfm-admin/translations/'.$encodeExplorer->lang.'.php';
global $_TRANSLATIONS;

$gateKeeper = new GateKeeper();
$gateKeeper->init();
$setUp = new SetUp();
$location = new Location();
$location->init();
$downloader = new Downloader();
$updater = new Updater();
$updater->init();

$timeconfig = $setUp->getConfig('default_timezone');
$timezone = (strlen($timeconfig) > 0) ? $timeconfig : "UTC";
date_default_timezone_set($timezone);

require_once 'vfm-admin/token.php';
global $_TOKENS;
$resetter = new Resetter();
$resetter->init();

if ($gateKeeper->isAccessAllowed()) {
    $fileManager = new FileManager();
    $fileManager->run($location);
    $encodeExplorer->run($location);
};

unset($_SESSION['upcoda']);
$_SESSION['upcoda'] = array();

unset($_SESSION['uplist']);
$_SESSION['uplist'] = array();

if (!isset($_GET['response'])) {
    if (isset($_ERROR) && strlen($_ERROR) > 0 ) {
        $_SESSION['error'] = $_ERROR;
    }
    if (isset($_SUCCESS) && strlen($_SUCCESS) > 0 ) {
        $_SESSION['success'] = $_SUCCESS;
    }
    if (isset($_WARNING) && strlen($_WARNING) > 0 ) {
        $_SESSION['warning'] = $_WARNING;
    }
} 

if (isset($_SESSION['error'])) {
    $_ERROR = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    $_SUCCESS = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['warning'])) {
    $_WARNING = $_SESSION['warning'];
    unset($_SESSION['warning']);
}

if (isset($_SESSION['vfm_dlist'])) {
    $_DLIST = $_SESSION['vfm_dlist'];
} else {
    $_DLIST = $setUp->getConfig('folderdeforder');
}

$uid = md5(uniqid(mt_rand()));

if (!empty($_SERVER['HTTPS']) 
    && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443
) {
    $http = "https://";
} else {
    $http = "http://";
}
$actual_link = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$actual_link = str_replace('&response', '', $actual_link);
$actual_link = str_replace('?response', '', $actual_link); 
$getcloud = filter_input(INPUT_GET, "d", FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_GET, "t", FILTER_SANITIZE_STRING);
$hash = filter_input(INPUT_GET, "h", FILTER_SANITIZE_STRING);
$getrp = filter_input(INPUT_GET, "rp", FILTER_SANITIZE_STRING);
$getusr = filter_input(INPUT_GET, "usr", FILTER_SANITIZE_STRING);
?>