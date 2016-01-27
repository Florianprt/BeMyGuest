<?php
/**
 * VFM - veno file manager downloader
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

require_once 'translations/'.$encodeExplorer->lang.'.php';

$gateKeeper = new GateKeeper();
$gateKeeper->init();
$setUp = new SetUp();
$downloader = new Downloader();
$utils = new Utils();
$logger = new Logger();
$actions = new Actions();

$timeconfig = $setUp->getConfig('default_timezone');
$timezone = (strlen($timeconfig) > 0) ? $timeconfig : "UTC";
date_default_timezone_set($timezone);

$getfile = filter_input(INPUT_GET, "q", FILTER_SANITIZE_STRING);
$getcloud = filter_input(INPUT_GET, "d", FILTER_SANITIZE_STRING);
$hash = filter_input(INPUT_GET, "h", FILTER_SANITIZE_STRING);
$supah = filter_input(INPUT_GET, "sh", FILTER_SANITIZE_STRING);
$playmp3 = filter_input(INPUT_GET, "audio", FILTER_SANITIZE_STRING);

$alt = $setUp->getConfig('salt');
$altone = $setUp->getConfig('session_name');
$maxfiles = $setUp->getConfig('max_zip_files');
$maxfilesize = $setUp->getConfig('max_zip_filesize');

if ($getfile && $hash && $supah
    && $downloader->checkFile($getfile) == true
    && md5($hash.$alt.$getfile) === $supah
) {
    /**
    * download single file 
    * (for non-logged users)
    */
    $headers = $downloader->getHeaders($getfile);
    // download file
    $downloader->resumableDownload(
        $headers['file'], 
        $headers['filename'], 
        $headers['file_size'], 
        $headers['content_type'], 
        $headers['disposition']
    );
    $logger->logDownload($headers['trackfile']);
    exit;

} elseif ($getfile && $hash
    && $downloader->checkFile($getfile) == true
    && md5($alt.$getfile.$altone.$alt) === $hash
) {
    /**
    * download single file, 
    * play Audio or show PDF 
    * (for logged users)
    */
    $headers = $downloader->getHeaders($getfile, $playmp3);

    if (($gateKeeper->isUserLoggedIn() 
        && $downloader->subDir($headers['dirname']) == true) 
        || $gateKeeper->isLoginRequired() == false
    ) {
        // download file
        $downloader->resumableDownload(
            $headers['file'], 
            $headers['filename'], 
            $headers['file_size'], 
            $headers['content_type'], 
            $headers['disposition']
        );

        if ($headers['content_type'] == "audio/mp3") {
            $logger->logPlay($headers['trackfile']);
        } else {
            $logger->logDownload($headers['trackfile']);
        }
        exit;
    }
    $_SESSION['error'] = "<i class=\"fa fa-ban\"></i> Access denied";
    header('Location:../');
    exit;

} elseif ($getcloud && $hash) {
    /**
    *
    * download multiple file as .zip
    *
    */
    $time = filter_input(INPUT_GET, "t", FILTER_SANITIZE_STRING);
    if (md5($alt.$time) === $hash
        && $downloader->checkTime($time) == true
    ) {

        $zipfiles = urldecode($getcloud);
        $pieces = explode(",", $zipfiles);

        if (count($pieces) > $maxfiles) {
            $_SESSION['error'] = $encodeExplorer->getString("too_many_files")." ".$maxfiles;
            header('Location:../');
            exit;
        }

        if (!file_exists('tmp')) {
            if (!mkdir('tmp', 0755)) {
                $_SESSION['error'] = "Cannot create a tmp dir for .zip files";
                header('Location:../');
                exit;
            } if (!chmod('tmp', 0755)) {
                $_SESSION['error'] = "Cannot set CHMOD 755 to tmp dir";
                header('Location:../');
                exit;
            }
        }

        $file = tempnam("tmp", "zip");

        if (!$file) {
            $_SESSION['error'] = "cannot set: tempnam(\"tmp\",\"zip\")";
            header('Location:../');
            exit;            
        }

        $zip = new ZipArchive();

        if ($zip->open($file, ZipArchive::OVERWRITE)!==true) {
            $_SESSION['error'] = "cannot open: $file\n";
            header('Location:../');
            exit;
        }

        $totalsize = 0;

        foreach ($pieces as $pezzo) {
            if ($downloader->checkFile($pezzo) == true) {
                $myfile = "../".urldecode(base64_decode($pezzo));
                $filepathinfo = $utils->mbPathinfo($myfile);
                $filename = $filepathinfo['basename'];

                $totalsize = $totalsize + File::getFileSize($myfile);
                $izeinm = $totalsize/1024/1024;

                if ($izeinm > $maxfilesize) {
                    $zip->close();
                    unlink($file);
                    $_SESSION['error'] = $setUp->formatsize($totalsize).": ".$encodeExplorer->getString("size_exceeded");
                    header('Location:../');
                    exit;
                } else {
                    $zip->addFile($myfile, $filename);
                    $logger->logDownload("./".urldecode(base64_decode($pezzo)));
                }
            }
        }
        $zip->close();

        $filename = $time.".zip";
        $file_size = File::getFileSize($file);
        $content_type = "application/zip";
        $disposition = "attachment";

        // download file
        $downloader->resumableDownload($file, $filename, $file_size, $content_type, $disposition);
        
        unlink($file);
        exit;
    }
    $_SESSION['error'] = "<i class=\"fa fa-ban\"></i> Access denied";
    header('Location:../');
    exit;
}
$_SESSION['error'] = "not enough data";
header('Location:../');
exit; ?>