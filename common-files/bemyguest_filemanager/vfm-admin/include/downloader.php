<?php
/**
 * VFM - veno file manager: include/downloader.php
 * Show download button for shared links
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
* Downloader
*/
if ($downloader->checkTime($time) == true) {


    print "<div class=\"intero centertext bigzip\">
    <a class=\"btn btn-primary btn-lg centertext\" href=\"vfm-admin/vfm-downloader.php?d="
    .$getcloud."&t=".$time."&h=".$hash."\"><i class=\"fa fa-cloud-download fa-5x\"></i><br>"
    .".zip</a></div>";

    print "<div class=\"intero\"><ul class=\"multilink\">";

    $zipfiles = urldecode($getcloud);
    $pieces = explode(",", $zipfiles);
    $totalsize = 0;
    $salt = $setUp->getConfig('salt');

    foreach ($pieces as $pezzo) {
        $myfile = urldecode(base64_decode($pezzo));
        $filepathinfo = Utils::mbPathinfo($myfile);
        $filename = $filepathinfo['basename'];
        $extension = $filepathinfo['extension'];
        $supah = md5($hash.$salt.$pezzo);
        $filesize = File::getFileSize($myfile);
        $totalsize += $filesize;
        if (array_key_exists($extension, $_IMAGES)) {
            $thisicon = $_IMAGES[$extension];
        } else {
            $thisicon = "fa-file-o";
        }
        print "<li><a class=\"btn btn-primary\" href=\"vfm-admin/vfm-downloader.php?q=".$pezzo."&h=".$hash."&sh=".$supah."\">"
        ."<span class=\"pull-left small\"><i class=\"fa ".$thisicon." fa-2x\"></i> ".$filename."</span>"
        ."<span class=\"pull-right small\">".$setUp->formatsize($filesize)." <i class=\"fa fa-download fa-2x\"></i></span></a></li>";
    }
    print "</ul></div>";
    
    // check number of files and total size 
    // if under the limits, show the zip button
    $max_zip_filesize = $setUp->getConfig('max_zip_filesize');
    $max_zip_files = $setUp->getConfig('max_zip_files');
    $totalsize = $totalsize/1024/1024;
    $totalfiles = count($pieces);

    if ($totalsize <= $max_zip_filesize && $totalfiles <= $max_zip_files) { ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.bigzip').fadeIn();
        });
        </script>
    <?php
    }

} else {
        print "<div class=\"intero centertext\">";
        print "<a class=\"btn btn-danger btn-lg centertext\" href=\"./\">"
        .$encodeExplorer->getString("link_expired")."</a>";
        print "</div>";
}
?>