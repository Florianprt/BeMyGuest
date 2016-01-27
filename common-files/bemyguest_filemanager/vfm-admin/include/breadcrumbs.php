<?php
/**
 * VFM - veno file manager: include/breadcrumbs.php
 * The block that displays breadcrumbs
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
* BreadCrumbs
*/
if ($setUp->getConfig("show_path") == true
    && $gateKeeper->isAccessAllowed() 
    && $location->editAllowed()
) { ?>
            <ol class="breadcrumb">
            <li><a href="?dir="><i class="fa fa-folder-open"></i> 
            <?php print $encodeExplorer->getString("root"); ?></a></li>
    <?php

    $cleandir = "?dir=".substr($setUp->getConfig('starting_dir'), 2);

    for ($i = 0; $i < count($location->path); $i++) {
                $stolink = $encodeExplorer->makeLink(
                    false, null, $location->getDir(
                        false, true, false, count($location->path) - $i - 1
                    )
                );
        if (strlen($stolink) > strlen($cleandir)) {
            print "<li><a href=\"".$encodeExplorer->makeLink(
                false, null, $location->getDir(
                    false, true, false, count($location->path) - $i - 1
                )
            )."\">";
            print "<i class=\"fa fa-folder-open-o\"></i> "
            .urldecode($location->getPathLink($i, false));
            print "</a></li>\n";
        }
    }
    print "</ol>";
} 
?>