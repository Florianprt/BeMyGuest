<?php
/**
 * VFM - veno file manager file sender
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
require 'class.php';
$lang = filter_input(INPUT_POST, 'thislang', FILTER_SANITIZE_STRING);
require 'translations/'.$lang.'.php';
$setUp = new SetUp();
$utils = new Utils();
$encodeExplorer = new EncodeExplorer();
$from = filter_input(INPUT_POST, "mitt", FILTER_VALIDATE_EMAIL);
$dest = filter_input(INPUT_POST, "dest", FILTER_VALIDATE_EMAIL);
$link = filter_input(INPUT_POST, "sharelink", FILTER_SANITIZE_STRING);
$attachments = explode(",", filter_input(INPUT_POST, "attach", FILTER_SANITIZE_STRING));
$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

$cc1 = filter_input(INPUT_POST, "send_cc_1", FILTER_VALIDATE_EMAIL);
$cc2 = filter_input(INPUT_POST, "send_cc_2", FILTER_VALIDATE_EMAIL);
$cc3 = filter_input(INPUT_POST, "send_cc_3", FILTER_VALIDATE_EMAIL);

if ($from && $dest && $link) {

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
    $mail->addReplyTo($from, '<'.$from.'>');
    $mail->addAddress($dest, '<'.$dest.'>');

    if ($cc1) {
        $mail->AddBCC($cc1, '<'.$cc1.'>');
    }
    if ($cc2) {
        $mail->AddBCC($cc2, '<'.$cc2.'>');
    }
    if ($cc3) {
        $mail->AddBCC($cc3, '<'.$cc3.'>');
    }

    $mail->Subject = $from." ".$encodeExplorer->getString('sent_some_files');

    $myfiles = "<ul>";
    foreach ($attachments as $value) {

        $filepathinfo = $utils->mbPathinfo(urldecode(base64_decode($value)));
        $filename = $filepathinfo['basename'];

        $myfiles .= "<li>".$filename."</li>";
    }
    $myfiles .= "</ul>";

    $mail->AddEmbeddedImage('images/mail-logo.png', 'logoimg', 'images/mail-logo.png');

    $mail->msgHTML(
        "<table width=\"100%\" border=\"0\" cellpadding=\"20\" cellspacing=\"0\"><tr><td align=\"center\" bgcolor=\"#D2D2D2\">\r\n"
        ."<img src=\"cid:logoimg\" /></td></tr><tr><td bgcolor=\"#D2D2D2\">"
        ."<table width=\"80%\" border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"20\"><tr><td bgcolor=\"#FFFFFF\">\r\n"
        ."<strong>".$from ."</strong> "
        .$encodeExplorer->getString('sent_some_files')."</td></tr>\r\n"
        ."<tr><td bgcolor=\"#FFFFFF\">".$myfiles."</td></tr>\r\n"
        ."<tr><td bgcolor=\"#FFFFFF\"><a style=\"padding:10px 20px; background:#51b754; color:#fff; text-decoration:none;\" href=\""
        .$link."\"><strong>"
        .$encodeExplorer->getString('download')."</strong></a></td></tr>\r\n"
        ."<tr><td bgcolor=\"#FFFFFF\">".$message."</td></tr></table></td></tr></table>"
    );

    $mail->AltBody = $from." ".$encodeExplorer->getString('sent_some_files').":\n " .$link;

    if (!$mail->send()) {
        print "Mailer Error: " . $mail->ErrorInfo;
    } else {
        print $encodeExplorer->getString('message_sent').": " .$dest;
    }
    /**
    *
    * send notification e-mail
    * to additional addresses
    *
    */
    /*
    $mail2 = clone $mail;
    $mail2->ClearAllRecipients();
    $mail2->Subject = $from." sent some files to: ".$dest;
    $mail2->setFrom($setfrom, $setUp->getConfig('appname'));
    $mail2->MsgHTML("<img src=\"cid:logoimg\" /><br><br>".$from." sent some files to: ".$dest.": ".$myfiles);
    $mail2->AddAddress('who-to@example.com', 'admin');
    // if you want to add some more recipients
    // $mail2->AddBCC('who-to-cc@example.com', 'John Doe');
    // $mail2->AddBCC('who-to-cc2@example.com', 'jack Doe');
    $mail2->send();
    */
} else {
    print $encodeExplorer->getString('fill_all_fields');
}
