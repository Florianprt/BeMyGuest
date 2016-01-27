<?php
/**
 * VFM - veno file manager password reset
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
require 'mail/PHPMailerAutoload.php';
require 'config.php';
require 'users.php';
require 'token.php';
require 'class.php';
session_name($_CONFIG["session_name"]);
session_start();
$lang = filter_input(INPUT_POST, 'thislang', FILTER_SANITIZE_STRING);
require 'translations/'.$lang.'.php';
$setUp = new SetUp();
$utils = new Utils();
$updater = new Updater();
$resetter = new Resetter();
$encodeExplorer = new EncodeExplorer();
$dest = filter_input(INPUT_POST, "user_email", FILTER_VALIDATE_EMAIL);
$pulito = filter_input(INPUT_POST, 'cleanurl', FILTER_SANITIZE_STRING);
$postcaptcha = filter_input(INPUT_POST, "captcha", FILTER_SANITIZE_STRING);

global $_USERS;
global $_TOKENS;

if (!$dest || ($setUp->getConfig("show_captcha_reset") == true && !$postcaptcha)) {
    print "<div class=\"alert alert-warning\">".$encodeExplorer->getString("fill_all_fields")."</div>";
    exit();
}
if (Utils::checkCaptchaReset($postcaptcha) !== true) {
    print "<div class=\"alert alert-danger\">".$encodeExplorer->getString("wrong_captcha")."</div>";
    exit();
}

if (!$updater->findEmail($dest)) {
    print "<div class=\"alert alert-danger\">".$encodeExplorer->getString("email_not_exist")."</div>";
    exit();
}
if (!$resetter->setToken($dest)) {
    print "<div class=\"alert alert-danger\">Error: token not set</div>";
    exit();

}
$message = $resetter->setToken($dest);

$setfrom = $setUp->getConfig('email_from');
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

if ($setUp->getConfig('smtp_enable') == true) {
    
    $timeconfig = $setUp->getConfig('default_timezone');
    $timezone = (strlen($timeconfig) > 0) ? $timeconfig : "UTC";
    date_default_timezone_set($timezone);

    $mail->isSMTP();
    $mail->SMTPDebug = 0;

    $smtp_auth = $setUp->getConfig('smtp_auth');

    $mail->Host = $setUp->getConfig('smtp_server');
    $mail->Port = (int)$setUp->getConfig('port');

    if ($setUp->getConfig('secure_conn') !== "none") {
        $mail->SMTPSecure = $setUp->getConfig('secure_conn');
    }
    
    $mail->SMTPAuth = $smtp_auth;

    if ($smtp_auth == true) {
        $mail->Username = $setUp->getConfig('email_login');
        $mail->Password = $setUp->getConfig('email_pass');
    }
}
$mail->setFrom($setfrom, $setUp->getConfig('appname'));
$mail->addAddress($dest, '<'.$dest.'>');

$mail->Subject = $setUp->getConfig('appname').": ".$encodeExplorer->getString('reset_password');

$altmessage = $encodeExplorer->getString('someone_requested_pwd_reset_1').": ".$message['name']."/n"
    .$encodeExplorer->getString('someone_requested_pwd_reset_2')."\n"
    .$encodeExplorer->getString('someone_requested_pwd_reset_3')."\n"
    .$pulito.$message['tok'];

$mail->AddEmbeddedImage('images/mail-logo.png', 'logoimg', 'images/mail-logo.png');

$mail->msgHTML(
    "<table width=\"100%\" border=\"0\" cellpadding=\"20\" cellspacing=\"0\"><tr><td align=\"center\" bgcolor=\"#D2D2D2\">\r\n"
    ."<img src=\"cid:logoimg\" /></td></tr><tr><td bgcolor=\"#D2D2D2\">"
    ."<table width=\"80%\" border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"20\"><tr><td bgcolor=\"#FFFFFF\">\r\n"
    .$encodeExplorer->getString('someone_requested_pwd_reset_1')
    ."<br>".$pulito."<br>".$encodeExplorer->getString('username').": <strong>".$message['name']."</strong></td></tr>\r\n"
    ."<tr><td bgcolor=\"#FFFFFF\">".$encodeExplorer->getString('someone_requested_pwd_reset_2')."</td></tr>\r\n"
    ."<tr><td bgcolor=\"#FFFFFF\">".$encodeExplorer->getString('someone_requested_pwd_reset_3')."</td></tr>\r\n"
    ."<tr><td bgcolor=\"#FFFFFF\"><a style=\"padding:10px 20px; background:#64a4b7; color:#fff; font-weight:bold; text-decoration:none;\""
    ."href=\"".$pulito.$message['tok']."\">Reset Password</a></td></tr></table></td></tr></table>"
);
$mail->AltBody = $altmessage;

if (!$mail->send()) {
    echo "<div class=\"alert alert-danger\">Mailer Error: " . $mail->ErrorInfo."</div>";
} else {
    print "<div class=\"alert alert-success\">".$encodeExplorer->getString('message_sent').": " .$dest."</div>";
}

