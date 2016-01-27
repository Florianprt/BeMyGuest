<?php
/**
 * VFM - veno file manager: include/list-folders.php
 * The block that displays folders
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
* Sort alphabetically array
*
* @param string $alfa first item to compare
* @param string $beta second item to compare
*
* @return sorted
*/
function cmpname($alfa, $beta)
{
    return strnatcasecmp($alfa->getName(), $beta->getName());
}

/**
* Sort array by date
*
* @param string $alfa first item to compare
* @param string $beta second item to compare
*
* @return sorted
*/
function cmptime($alfa, $beta)
{   
    // alfone, betone = older-newer
    // betone, alfone = newer-older
    $alfone = filectime($alfa->getLocation().$alfa->getName());
    $betone = filectime($beta->getLocation().$beta->getName());
    return strcmp($betone, $alfone);
}

if ($_DLIST == "date") {
    $metodo = "cmptime";
} else {
    $metodo = "cmpname";
}


/**
* List Folders
*/
if ($gateKeeper->isAccessAllowed()) { ?>
    <script src="vfm-admin/js/datatables.js"></script>
    <section class="vfmblock tableblock">
        <table class="table table-striped table-condensed" width="100%" id="sortable">
            <thead>
                <tr class="rowa two">
        <?php
                $cleandir = "?dir="
                    .substr(
                        $setUp->getConfig('starting_dir')
                        .$gateKeeper->getUserInfo('dir'), 2
                    );
                $stolink = $encodeExplorer->makeLink(
                    false, null, $location->getDir(false, true, false, 1)
                );

                $stodeeplink = $encodeExplorer->makeLink(
                    false, null, $location->getDir(false, true, false, 0)
                );

    if (strlen($stolink) > strlen($cleandir)) {
            $parentlink = $encodeExplorer->makeLink(
                false, null, $location->getDir(false, true, false, 1)
            );
    } else {
            $parentlink = "?dir=";
    } 

    print "<td class=\"firstfolderitem icon col-xs-1 centertext\">";

    // Ready to display folders.
    if (!$encodeExplorer->dirs) {               
        print "<a href=\"".$parentlink."\"><i class=\"fa fa-folder-open\"></i></a></td><td>
        <a class=\"item\" href=\"".$parentlink."\">..</a></td>";
    } else {

        if (count($encodeExplorer->dirs) > 1) {
            /*
            * switch listing
            */
            print "<ul><li><a ";
            if ($metodo == "cmpname") {
                print "class=\"active\""; 
            }
            print "href=\"".$stodeeplink."&dlist=alpha\"><i class=\"fa fa-sort-alpha-asc\"></i></a></li>";
            print "<li><a ";
            if ($metodo == "cmptime") { 
                print "class=\"active\""; 
            }
            print "href=\"".$stodeeplink."&dlist=date\"><i class=\"fa fa-calendar\"></i></a></li></ul>";

        }
        print "</td><td></td>";
    
        // edit column
        if ($gateKeeper->isAllowed('rename_enable') && $location->editAllowed()) {
            print "<td class=\"mini del centertext col-xs-1\"><i class=\"fa fa-pencil\"></i></td>";
        }
        // delete column
        if ($gateKeeper->isAllowed('delete_enable') && $location->editAllowed()) {
            print "<td class=\"mini del centertext col-xs-1\"><i class=\"fa fa-trash-o\"></i></td>";
        }
    }

    ?>
                </tr>
            </thead>
            <tbody>
    <?php
    // Ready to display folders.
    if ($encodeExplorer->dirs) {

        $showdirs = $encodeExplorer->dirs;        
        usort($showdirs, $metodo);

        foreach ($showdirs as $dir) {
            $thislink = $encodeExplorer->makeLink(
                false, null, $location->getDir(
                    false, true, false, 0
                ).$dir->getNameEncoded()
            );

            $del = $location->getDir(false, true, false, 0).$dir->getNameEncoded();

            $thisdel = $encodeExplorer->makeLink(
                false, $del, $location->getDir(
                    false, true, false, 0
                )
            );
            $thisdir = urldecode(
                $encodeExplorer->location->getDir(false, true, false, 0)
            );

            print "<tr class=\"rowa\">\n";
            print "<td class=\"icon centertext\"><a href=\"".$thislink
            ."\"><i class=\"fa fa-folder\"></i></a></td>\n";
            print "<td class=\"name\">\n";
            print "<a href=\"".$thislink."\">";
            print $dir->getName();
            print "</a>\n";
            print "</td>\n";

            if ($gateKeeper->isAllowed('rename_enable') 
                && $location->editAllowed()
            ) {
                print "<td class=\"icon centertext rename\">"
                ."<a href=\"javascript:void(0)\" data-thisdir=\""
                .$thisdir."\" data-thisname=\"".$dir->getName()
                ."\"><i class=\"fa fa-pencil-square-o\"></i></td>\n";
            }
            if ($gateKeeper->isAllowed('delete_enable') 
                && $location->editAllowed()
            ) {
                $delquery = base64_encode($del);
                $cash = md5($delquery.$setUp->getConfig('salt').$setUp->getConfig('session_name'));

                print "<td class=\"del centertext\"><a data-name=\""
                .$dir->getName()
                ."\" href=\"".$thisdel."&h=".$cash
                ."&fa=".$delquery."\">
                <i class=\"fa fa-times\"></i></a></td>";
            }
            print "</tr>\n";
        }
    } ?>
            </tbody>
        </table>
    </section>

    <?php
    if ($setUp->getConfig("show_pagination_folders") == true) { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sortable').dataTable({
                    "ordering": false,
    <?php
        if ($setUp->getConfig("show_pagination_num") == true) { ?>
                    "sPaginationType": "full_numbers",
        <?php
        } ?>
            "iDisplayLength": <?php print $setUp->getConfig('folderdefnum'); ?>,
                    "oLanguage": {
                        "sEmptyTable":      "--",
                        "sInfo":            "_START_ / _END_ - _TOTAL_ ",
                        "sInfoEmpty":       "",
                        "sInfoFiltered":    "",
                        "sInfoPostFix":     "",
                        "sLengthMenu":      "<i class='fa fa-list-ol'></i> _MENU_",
                        "sLoadingRecords":  "<i class='fa fa-refresh fa-spin'></i>",
                        "sProcessing":      "<i class='fa fa-refresh fa-spin'></i>",
                        "sSearch":          "<span class='input-group-addon'><i class='fa fa-search'></i></span> ",
                        "sZeroRecords":     "--",
                        "oPaginate": {
                            "sFirst": "<i class='fa fa-angle-double-left'></i>",
                            "sLast": "<i class='fa fa-angle-double-right'></i>",
                            "sPrevious": "<i class='fa fa-angle-left'></i>",
                            "sNext": "<i class='fa fa-angle-right'></i>"
                        }
                    }
                });
            });
        </script>
    <?php
    }
} ?>