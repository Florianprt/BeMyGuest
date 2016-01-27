<?php
/**
 * VFM - veno file manager: include/login.php
 * front-end login panel
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
* Login Area
*/
if (!$gateKeeper->isAccessAllowed()) { ?>
    <section class="vfmblock">
        <div class="login">
        <form enctype="multipart/form-data" method="post" role="form" 
        action="<?php print $encodeExplorer->makeLink(false, null, ""); ?>">
            <div id="login_bar" class="form-group">
                <div class="form-group">
                    <label for="user_name">
                        <?php 
                        print $encodeExplorer->getString("username"); 
                        ?>
                    </label>
                    <input type="text" name="user_name" 
                    value="" id="user_name" 
                    class="form-control" 
                    placeholder="<?php print $encodeExplorer->getString("username"); ?>" />
                </div>
                <div class="form-group">
                    <label for="user_pass">
                        <?php 
                        print $encodeExplorer->getString("password"); 
                        ?>
                        </label>
                    <input type="password" name="user_pass" 
                    id="user_pass" class="form-control" 
                    placeholder="<?php print $encodeExplorer->getString("password"); ?>" />
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="vfm_remember" value="yes"> Remember me
                    </label>
                </div>

            <?php 
            /* ************************ CAPTCHA ************************* */
    if ($setUp->getConfig("show_captcha") == true ) { 
        $capath = "vfm-admin/";
        include "vfm-admin/include/captcha.php"; 
    }   ?>
                <button type="submit" class="btn btn-primary btn-block" />
                    <i class="fa fa-sign-in"></i> 
                    <?php print $encodeExplorer->getString("log_in"); ?>
                </button>
            </div>
        </form>
        <a href="?rp=req"><?php print $encodeExplorer->getString("lost_password"); ?></a>
        </div>
    </section>
    <?php
}

if ($gateKeeper->isAccessAllowed() 
    && $gateKeeper->showLoginBox()
) { ?>

        <section class="vfmblock">
            <form enctype="multipart/form-data" method="post" 
            action="<?php print $encodeExplorer->makeLink(false, null, ""); ?>"
            class="form-inline" role="form">
                <div id="login_bar">
                    <div class="form-group">
                        <label class="sr-only" for="user_name">
                            <?php 
                            print $encodeExplorer->getString("username"); 
                            ?>:
                        </label>
                        <input type="text" name="user_name" 
                        value="" id="user_name" 
                        class="form-control" 
                        placeholder="<?php print $encodeExplorer->getString("username"); ?>" />
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="user_pass">
                            <?php 
                            print $encodeExplorer->getString("password"); 
                            ?>
                            : </label>
                        <input type="password" name="user_pass" 
                        id="user_pass" class="form-control" 
                        placeholder="<?php print $encodeExplorer->getString("password"); ?>" />
                    </div>


            <?php 
            /* ************************ CAPTCHA ************************* */
    if ($setUp->getConfig("show_captcha") == true ) { 
        $capath = "vfm-admin/";
        include "vfm-admin/include/captcha.php"; 
    }   ?>
                    <button type="submit" class="btn btn-primary" />
                        <i class="fa fa-sign-in"></i> 
                        <?php print $encodeExplorer->getString("log_in"); ?>
                    </button>
                </div>
            </form>
            <a class="small" href="?rp=req"><?php print $encodeExplorer->getString("lost_password"); ?></a>
        </section>
        <?php
}