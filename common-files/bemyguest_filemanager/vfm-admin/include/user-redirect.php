<?php
/**
 * VFM - veno file manager: include/user-redirect.php
 * redirect user inside his directory if only one
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
* Redirect User
*/
// check if any folder is assigned to the current user
if ($gateKeeper->isAccessAllowed() && $gateKeeper->getUserInfo('dir') !== null) {
    $userpatharray = array();
    $userpatharray = json_decode(GateKeeper::getUserInfo('dir'), true);

    // check if user has only one folder
    if (count($userpatharray) === 1) {
        $cleandir = substr(
            $setUp->getConfig('starting_dir')
            .$userpatharray[0], 2
        );
        // check if user is trying to access to the root
        if (!isset($_GET['dir']) || strlen($_GET['dir']) < strlen($cleandir)) { ?>
            <script type="text/javascript">
                window.location.replace("?dir=<?php echo $cleandir; ?>");
            </script>                   
    <?php 
        }
    }
} ?>