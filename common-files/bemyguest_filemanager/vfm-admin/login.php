<?php
/**
 * VFM - veno file manager administration login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2013-2014 Nicola Franchini
 * @license   Regular License http://codecanyon.net/licenses/regular
 * @link      http://filemanager.veno.it/
 */
error_reporting(E_ALL ^ E_NOTICE);
require 'config.php';
session_name($_CONFIG["session_name"]);
session_start();

if (isset($_GET['logout'])) {
    unset($_SESSION['vfm_admin_name']);
    session_destroy();
}
require 'users.php';
require 'class.php';

$encodeExplorer = new EncodeExplorer();
$setUp = new SetUp();
$timeconfig = $setUp->getConfig('default_timezone');
$timezone = (strlen($timeconfig) > 0) ? $timeconfig : "UTC";
date_default_timezone_set($timezone);

$logged=false;
$error=null;
$captchaerror=null;

if (isset( $_SESSION['vfm_admin_name'])) {
    $logged = true;
}
$postusername = filter_input(
    INPUT_POST, "vfm_admin_name", FILTER_SANITIZE_STRING
);
$postuserpass = filter_input(
    INPUT_POST, "vfm_admin_pass", FILTER_SANITIZE_STRING
);


if ($postusername && $postuserpass) {
    if (logIn($postusername, $postuserpass)) {
        $logged = true;
    } else {
        $logged = false;
    }
}
/**
* check log in
*
* @param string $postusername username
* @param string $postuserpass password
*
* @return true/false
*/
function logIn ($postusername, $postuserpass)
{
    global $error;
    global $setUp;

    if ($setUp->getConfig('show_captcha') == true ) {
        global $captchaerror;
        $postcaptcha = filter_input(
            INPUT_POST, "captcha", FILTER_SANITIZE_STRING
        );
        $postcaptcha = strtolower($postcaptcha);

        if ($postcaptcha !== $_SESSION['captcha']
        ) {
            $captchaerror = "Error";
            return false;
        }
    }

    global $_USERS;
    global $_CONFIG;
    foreach ($_USERS as $user) {
        if ($user['name'] == $postusername
            && crypt(
                $_CONFIG['salt'].urlencode($postuserpass),
                $user['pass']
            ) == $user['pass']
            && $user['role'] == 'superadmin'
        ) {
            $_SESSION['vfm_admin_name'] = $postusername;
            return true;
        }
    }
    $error = "Error";
    return false;
}

if ($logged) {
    header('Location:index.php');
    exit();
} else { 
    /* *********** GET LANG ************* */
    if ( isset($_GET['lang'])) {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $_GET['lang'];
    }
    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    } else {
        $lang = $_CONFIG["lang"];
    }
    include_once 'translations/'.$lang.'.php';
    ?>
    <!DOCTYPE HTML>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Login | <?php print $setUp->getConfig('appname'); ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php 
        if ($setUp->getConfig("txt_direction") == "RTL") { ?>
            <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
        <?php 
        } ?>   
        <link rel="stylesheet" href="vfm-style.css">
        <link rel="stylesheet" href="skins/<?php print $setUp->getConfig('skin'); ?>">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="js/jquery-1.11.1.min.js"></script>
        <!--[if lt IE 9]>
        <script src="js/html5.js" type="text/javascript"></script>
        <script src="js/respond.min.js" type="text/javascript"></script>
        <![endif]-->

    </head>
    <body>
    <div class="vfmwrapper">
    <div class="topbanner">

    <?php // **************** LANGUAGE SELECTOR **************** // 

    if ($setUp->showLangMenu()) { ?>

        <div class="btn-group pull-right">
        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag"></i>
        </button>
    <?php
        print ($encodeExplorer->printLangMenu())."</div>";
    } ?>
    </div>
        <header class="head">
    <?php
    if ($setUp->getConfig("show_head") == true ) { ?>
        <a href="../"><img alt="<?php print $setUp->getConfig('appname'); ?>" 
            class="pull-left img-responsive" 
            src="images/<?php print $setUp->getConfig('logo'); ?>">
        </a>
    <?php
    }
    ?>
        </header>
          <div id="error">
                <?php
    if ($error) {
            print "<div class=\"response nope\">"
            .$encodeExplorer->getString('wrong_pass')."</div>";
    }

    if ($captchaerror) {
            print "<div class=\"response nope\">"
            .$encodeExplorer->getString('wrong_captcha')."</div>";
    }

     ?>
            </div>

        <section class="vfmblock">

            <div class="login">
                <h2>
                    <i class="fa fa-cogs"></i> <?php print $encodeExplorer->getString('administration'); ?>
                </h2>
                <form enctype="multipart/form-data" 
                method="post" role="form" 
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="vfm_user_name"><?php print $encodeExplorer->getString('username'); ?></label>
                        <input type="text" name="vfm_admin_name" 
                        value="" class="form-control" placeholder="<?php echo $encodeExplorer->getString('username'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="vfm_user_pass"><?php print $encodeExplorer->getString('password'); ?></label>
                        <input type="password" name="vfm_admin_pass" 
                        class="form-control" placeholder="<?php print $encodeExplorer->getString('password'); ?>" />
                    </div>


            <?php 
            /* ************************ CAPTCHA ************************* */
    if ($setUp->getConfig('show_captcha') == true ) { 
        $capath = "";
        include "include/captcha.php"; 
    }   ?>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" />
                        <i class="fa fa-sign-in"></i> <?php print $encodeExplorer->getString('log_in'); ?></button>
                    </div>
                </form>
                <p><a href="../"><i class="fa fa-home"></i> <?php print $setUp->getConfig('appname'); ?></a></p>
            </div>
            </section>

            <footer class="footer">
            <span class="pull-left"><a href="../">
                <?php print $_CONFIG['appname']; ?> </a> 
                &copy; <?php echo date('Y'); ?>
            </span>

            <a class="pull-right" title="Veno File Manager" 
            target="_blank" href="http://filemanager.veno.it/">
            <i class="vfmi vfmi-typo"></i></a>
            </footer>
        </div>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
?>