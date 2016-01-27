<?php
/**
 * VFM - veno file manager: include/captcha.php
 * CAPTCHA
 *
 * PHP version 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2013-2014 Nicola Franchini
 * @license   Regular License http://codecanyon.net/licenses/regular
 * @link      http://filemanager.veno.it/
 */ ?>
    <div class="form-group captcha-group">
        <div class="input-group">
            <span class="input-group-addon captchadd">
                <img src="<?php echo $capath; ?>captcha.php" id="captcha" />
            </span>

            <input class="form-control input" id="inputc" type="text" name="captcha" placeholder="<?php echo $encodeExplorer->getString('enter_captcha'); ?>" />
            <span class="input-group-btn">
                <button class="btn btn-primary btn" type="button" id="capreload"><i class="fa fa-refresh"></i></button>
            </span>
        </div>
    </div>
    <script>
        $(function() {
            $('#capreload').click(function(){  
                $('#captcha').attr('src', '<?php echo $capath; ?>captcha.php?' + (new Date).getTime());
                $('#inputc').val('');
            });
        });
    </script>