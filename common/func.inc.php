<?php
date_default_timezone_set("Asia/Tehran");
function checkUppercase($string)
{
    if (preg_match('/[A-Z]/', $string) === 0) {
        return 0;
    }

    return 1;
}

function checkDateFormat($date)
{
    //match the format of the date
    if (preg_match('/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/', $date, $parts)) {
        //check weather the date is valid of not
        if (checkdate($parts[2], $parts[3], $parts[1])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isValidDateTime($dateTime)
{
    if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) {
        if (checkdate($matches[2], $matches[3], $matches[1])) {

            return true;
        }
    }

    return false;
}

function checkBoxValue($value)
{
    if ($value == 'on') {
        $value = 1;
    } else {
        $value = 0;
    }

    return $value;
}

function serialNoCreator($prefix_serial_number)
{
    $serial_number = $prefix_serial_number . uniqid();

    return $serial_number;
}

function dateCreator()
{
    $creation_date = getdate();
    $creation_date = $creation_date['year'] . '-' . $creation_date['mon'] . '-' . $creation_date['mday'] . ' ' . $creation_date['hours'] . ':' . $creation_date['minutes'] . ':' . $creation_date['seconds'];

    return $creation_date;
}

function voucherCodeCreator()
{
    //$chars = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16))

    $guid = '';
    $uid = uniqid('', true);
    $data = '';
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['LOCAL_ADDR'];
    $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    if (substr($hash, 0, 1) == '0') {
        voucherCodeCreator();
    }
    $guid = substr($hash, 0, 4) .
        substr($hash, 8, 4) .
        substr($hash, 24, 4) .
        substr($hash, 20, 4);

    return $guid;
}

function display_filesize($filesize)
{
    if (is_numeric($filesize)) {
        $decr = 1024;
        $step = 0;

        $prefix = array('بایت', 'کیلو بایت', 'مگا بایت', 'گیگا بایت', 'ترا بایت', 'پارا بایت');

        while (($filesize / $decr) > 0.9) {
            $filesize = $filesize / $decr;

            ++$step;
        }

        return round($filesize, 2) . ' ' . $prefix[$step];
    } else {
        return 'NaN';
    }
}

function generatePassword($length = 9)
{
    // start with a blank password

    $password = '';
    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = 'BCDFGHJKLMNPQRTVWXYZ';
    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
        $length = $maxlength;
    }
    // set up a counter for how many characters are in the password so far
    $i = 0;
    // add random characters to $password until $length is reached
    while ($i < $length) {

        // pick a random character from the possible ones
        $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
        // have we already used this character in $password?
        if (!strstr($password, $char)) {
            // no, so it's OK to add it onto the end of whatever we've already got...
            $password .= $char;
            // ... and increase the counter by one
            ++$i;
        }
    }

    // done!
    return $password;
}

function generatePasswordNumber($length = 9)
{

    // start with a blank password

    $password = '';

    // define possible characters - any character in this string can be

    // picked for use in the password, so if you want to put vowels back in

    // or add special characters such as exclamation marks, this is where

    // you should do it

    $possible = '21346789';

    // we refer to the length of $possible a few times, so let's grab it now

    $maxlength = strlen($possible);

    // check for length overflow and truncate if necessary

    if ($length > $maxlength) {
        $length = $maxlength;
    }

    // set up a counter for how many characters are in the password so far

    $i = 0;

    // add random characters to $password until $length is reached

    while ($i < $length) {

        // pick a random character from the possible ones

        $char = substr($possible, mt_rand(0, $maxlength - 1), 1);

        // have we already used this character in $password?

        if (!strstr($password, $char)) {

            // no, so it's OK to add it onto the end of whatever we've already got...

            $password .= $char;

            // ... and increase the counter by one

            ++$i;
        }
    }

    // done!

    return $password;
}

function redirectPage($page, $message = '', $longMsg=0)
{
    global $conn, $messageStack;
    $delayTime = ($longMsg==1?5000:1000) ;
    ?>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <script language="javascript">
            setTimeout("window.location='<?=$page ?>'", <?php echo $delayTime; ?>);
        </script>
        <style>
            body {
                font-family: "iranyekan", Arial, sans-serif;
                background-color: #e2e2e2;
                line-height: 30px;
                direction: rtl;
                text-align: right;
            }

            .a {

                direction: rtl;
                font-family: "IRANSansWeb", Arial, sans-serif !important;
                background-color: #2e4672;
                border: 3px solid #004085;
                width: 500px;
                margin-top: 10%;
                margin-right: auto;
                margin-left: auto;
                position: relative;
                padding-left: 200px;
                text-align: left;
                border-radius: 5px;
                -moz-border-radius: 5px;

                -o-border-radius: 5px;
                -webkit-border-radius: 5px;
                box-shadow: 0 0 5px;
            }

            a {
                direction: rtl;
                font-family: "IRANSansWeb", Arial, sans-serif !important;
                color: #ffee58;
                font-size: 18px;
                text-align: right;
                text-decoration: none;
                list-style: none;
            }
            @font-face {
                font-family: 'IRANSansWeb';
                src: url('../templates/template_fa/assets/fonts/IRANSansWeb.eot?#iefix-wwn5ej') format('embedded-opentype'),
                url('../templates/template_fa/assets/fonts/IRANSansWeb.woff?-wwn5ej') format('woff'),
                url('../templates/template_fa/assets/fonts/IRANSansWeb.ttf?-wwn5ej') format('truetype');
                font-weight: bold;
                font-style: normal;
            }
        </style>
    </head>
    <body>


    <div style="text-align: center;">
        <div class="a">
            <div style="margin-left: 20px; padding: 20px; direction: rtl; width: 600px;color: #004085 !important;">

                <h4 style="right: 50%; text-align: center;">

                    <?= $message ?>
                </h4>
                <hr>
                <a href="<?= $page ?>" style="font-family: iranyekan, Arial, sans-serif;">در صورت عدم انتقال خودکار به صفحه اصلی، روی این لینک کلیک کنید</a>

                <small> (Loding ...)</small>

                <div style="clear:both"></div>

                <br>
            <!--    <img src="<?php /*echo RELA_DIR . 'templates/' . CURRENT_SKIN; */?>/assets/img/logo.png "
                     align="right" style="position:absolute; top:130px; right:50%;" width="50" height="50; right:80%;" >-->
                <br>

            </div>
        </div>
    </div>
    </body>
    </html>

    <?php
    die();
}

function GetExtension($str)
{
    $i = strrpos($str, '.');

    if (!$i) {
        return '';
    }

    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);

    return $ext;
}

function newSendMails($email = "", $subject, $body, $header = '')
{
    global $admin_info;
    require "PHPMailer-master/PHPMailerAutoload.php";

    //set_time_limit(3000);
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "$header\r\n" . "Reply-To: " . SMTP_USERNAME . "\r\n" . "X-Mailer: PHP/" . phpversion();

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPOptions = array
    (
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host = "mail.moodupper.com";
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;          // turn on SMTP authentication
    $mail->Username = '_moodpatt@moodupper.com'; // SMTP username
    $mail->Password = "XK{,dL{C[rdi"; // SMTP password

    $mail->From = "moodpatt@moodupper.com";

    $mail->CharSet = "utf-8";

    // $mail->FromName = $admin_info[ 'name' ] . " " . $admin_info[ 'family' ];
    $mail->FromName = 'Admin';
    $mail->IsHTML(true);
    $mail->SetLanguage("fa", ROOT_DIR . "common/PHPMailer-master/");
    $mail->Subject = $subject;
    //$mail->Body = $body;
    $mail->Body = 'test send mail from moodpattern';
    $mail->ClearAddresses();

    if ($email != "") {
        $mail->AddAddress($email);
    } else {
        $mail->AddAddress('fheydarlou@icloud.com');
    }

    //$mail->AddBCC('fheydarlou@icloud.com');
    //echo '<pre>';print_r($mail);die('mail array');
    //try {
        //$res = $mail->Send();
        //die($res);
    //} catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        //die('test2');
    //}
    
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}

function convertDate($date)
{
    include_once 'jdf.php';
    list($date, $time) = explode(' ', $date);
    list($g_y, $g_m, $g_d) = explode('-', $date);
    list($j_y, $j_m, $j_d) = gregorian_to_jalali($g_y, $g_m, $g_d);
    list($h, $m, $s) = explode(':', $time);
    $date = "$j_y/$j_m/$j_d $time";

    return $date;
}

function convertJToGDate($date)
{
    include_once 'jdf.php';
    $dateTime = explode('/', $date);
    $g_y = $dateTime[0];
    $g_m = $dateTime[1];
    $g_d = $dateTime[2];
    list($j_y, $j_m, $j_d) = jalali_to_gregorian($g_y, $g_m, $g_d);
    $j_m = $j_m < 10 ? '0' . $j_m : $j_m;
    $j_d = $j_d < 10 ? '0' . $j_d : $j_d;
    $date = "$j_y-$j_m-$j_d";

    return $date;
}

function round_func($x)
{
    //echo $x ."<BR>";
    $len = strlen($x);
    //echo $length."<BR>";
    //echo substr($x,$len-($len-1),1);
    if (substr($x, $len - ($len - 1), 1) < 5) {
        return (substr($x, 0, $len - ($len - 1)) . 5) * pow(10, $len - 2);
    } else {
        //return 1000;
        return round($x, ((strlen($x)) * -1));
    }
}

function handleData($data)
{
    return handleSQLData(trim(stripslashes($data)));
}

function checkSite($site)
{
    if (preg_match("^[a-z\-\.]+[a-z0-9_\-]+\.[a-z0-9_\-\.]+$", $site)) {
        return 0;
    } else {
        return 1;
    }
}

function handleSQLData($data)
{
    $myData = str_replace("'", "''", $data);
    if (DB_TYPE == 'mysql') {
        $myData = str_replace('\\', '\\\\', $myData);
    }

    return $myData;
}

function handleSql($theValue)
{
    if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    $theValue = function_exists('mysql_real_escape_string') ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    return $theValue;
}

function checkSystemStatus()
{
    if (SYSTEM_STATUS == 1) {
        include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/system.stop.php';
        die();
    }
}

function checkMail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 0;
    } else {
        return 1;
    }
}

function inputCheckNumericId($ascii)
{
    if (preg_match('/^[0-9,]+$/i', $ascii)) {
        //^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+[\.a-zA-Z0-9]+$------>>>>/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/

        return 1;
    } else {
        return 0;
    }
}

function inputCheckEmails($ascii)
{
    if (preg_match("/^[a-zA-Z0-9@_.,\-]+$/i", $ascii)) {
        //^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+[\.a-zA-Z0-9]+$------>>>>/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/

        return 1;
    } else {
        return 0;
    }
}

function checkJoinMail($email)
{
    if (preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", $email)) {
        //^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+[\.a-zA-Z0-9]+$------>>>>/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/

        return 0;
    } else {
        return 1;
    }
}

function checkAscii($ascii)
{
    if (preg_match("^[a-zA-Z0-9\.\,\+\!\@\#\$\%\^\&\*\(\)\:\~\/]+$", $ascii)) {
        return 0;
    } else {
        return 1;
    }
}

function checkUser($ascii)
{
    if (ereg("^[a-zA-Z0-9\-\_]+$", $ascii)) {
        return 0;
    } else {
        return 1;
    }
}

function checkDescription($alpha)
{
    if (preg_match("^[a-zA-Z0-9\s ]+$", $alpha)) {
        return 1;
    } else {
        return 0;
    }
}

function checkAlpha($alpha)
{
    if (preg_match('^[a-zA-Z ]+$', $alpha)) {
        return 0;
    } else {
        return 1;
    }
}

function checkLength($str, $length)
{
    if (strlen($str) > $length) {
        return -1;
    }

    return 0;
}

function checkNumeric($num)
{
    if (ereg('^[0-9]+$', $num)) {
        return 0;
    } else {
        return 1;
    }
}

function checkDigit($digit)
{
    /*if(ereg("^[0-9]+$", $digit))

    {

        return 0;

    }else {

        return 1;

    }

    */
    return 0;
}

function getDatetime()
{
    return date('Y-m-d H:i:s');
}

function getDateo()
{
    return date('Y-m-d');
}

function generate_password()
{
    $fillers = '1234567890!@#$%&*-_=+^';
    $fillers .= date('h-i-s, j-m-y, it is w Day z ');
    $fillers .= '123!@#$%&*-_4567!@#$%&*-_890=+^';
    $temp = md5($fillers);
    $temp = substr($temp, 5, 10);

    return $temp;
}

/**************************************************************************************************/

/*  Interface operation																			  */

/**************************************************************************************************/
function initPage($rs, $pageSize, &$currentPage, &$pageCount, &$totalRecord)
{
    $totalRecord = $rs->RecordCount();
    $pageCount = $totalRecord / $pageSize;

    if (!is_int($pageCount)) {
        $pageCount = intval($pageCount);
        $pageCount += 1;
    }
    $currentPage = intval($currentPage);
    if ($currentPage < 1) {
        $currentPage = 1;
    }
    if ($currentPage > $pageCount) {
        $currentPage = $pageCount;
    }
}

function showPageButton($currentPage, $pageCount, $totalRecord, $webaddress, $n = '')
{
    ?>
    <div class="pagination">
        <?php
        if ($currentPage > 1) {
            if ($currentPage < $pageCount) {
                ?>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=1" title="">&laquo; First</a>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $currentPage - 1 ?>" title="">&laquo; pre</a>
                <?php
                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }
                    ?>
                    <a href="<?= ($i != $currentPage ? $webaddress . '&currentPage' . $n . '=' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>"><?= $i ?></a>
                    <?php

                }
                ?>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $currentPage + 1 ?>" title="">Next Page &raquo;</a>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $pageCount ?>" title="">Last &raquo;</a>
                <?php

            } else {
                ?>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=1" title="">&laquo; First</a>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $currentPage - 1 ?>" title="">&laquo; Previous Page</a>

                <?php
                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }
                    ?>
                    <a href="<?= ($i != $currentPage ? $webaddress . '&currentPage' . $n . '=' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>" title=""><?= $i ?></a>
                    <?php

                }
                ?>
                <a href="javascript:;" title="">Next Page &raquo;</a>
                <a href="javascript:;" title="">Last &raquo;</a>
                <?php

            }
        } else {
            if ($currentPage < $pageCount) {
                ?>
                <a href="javascript:;" title="">&laquo; First</a>
                <a href="javascript:;" title="">&laquo; Previous Page</a>
                <?php
                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    //die('1');
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }
                    ?>
                    <a href="<?= ($i != $currentPage ? $webaddress . '&currentPage' . $n . '=' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>"><?= $i ?></a>
                    <?php

                }
                ?>
                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $currentPage + 1 ?>" title="">Next Page &raquo;</a>

                <a href="<?= $webaddress ?>&currentPage<?= $n ?>=<?= $pageCount ?>" title="">Last &raquo;</a>
                <?php

            } else {
                ?>
                <a href="javascript:;" title="">&laquo; First</a>
                <a href="javascript:;" title="">&laquo; Previous Page</a>
                <?php
                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }
                    ?>
                    <a href="<?= ($i != $currentPage ? $webaddress . '&currentPage' . $n . '=' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>"><?= $i ?></a>
                    <?php

                }
                ?>
                <a href="javascript:;" title="">Next Page &raquo;</a>
                <a href="javascript:;" title="">Last &raquo;</a>
                <?php

            }
        }

        //echo $currentPage . "/" . $pageCount . "صفحه مجموع: " . $totalRecord . " رکورد";

        ?>

    </div> <!-- End .pagination -->

    <div class="clear"></div>

    <?php

}

function showPageButtonSeo($currentPage, $pageCount, $totalRecord, $webaddress)
{
    ?>

    <div class="pagination">

        <?php

        if ($currentPage > 1) {
            if ($currentPage < $pageCount) {
                ?>

                <a href="<?= $webaddress ?>PG-1" title="ابتدا">&laquo; ابتدا</a>

                <a href="<?= $webaddress ?>PG-<?= $currentPage - 1 ?>" title="صفحه قبلی">&laquo; صفحه قبلی</a>

                <?php

                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }

                    ?>

                    <a href="<?= ($i != $currentPage ? $webaddress . 'PG-' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>" title="<?= $i ?>"><?= $i ?></a>

                    <?php

                }

                ?>

                <a href="<?= $webaddress ?>PG-<?= $currentPage + 1 ?>" title="صفحه بعدی">صفحه بعدی &raquo;</a>

                <a href="<?= $webaddress ?>PG-<?= $pageCount ?>" title="انتها">انتها &raquo;</a>

                <?php

            } else {
                ?>

                <a href="<?= $webaddress ?>PG-1" title="ابتدا">&laquo; ابتدا</a>

                <a href="<?= $webaddress ?>PG-<?= $currentPage - 1 ?>" title="صفحه قبلی">&laquo; صفحه قبلی</a>

                <?php

                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }

                    ?>

                    <a href="<?= ($i != $currentPage ? $webaddress . 'PG-' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>" title="<?= $i ?>"><?= $i ?></a>

                    <?php

                }

                ?>

                <a href="javascript:;" title="صفحه بعدی">صفحه بعدی &raquo;</a>

                <a href="javascript:;" title="انتها">انتها &raquo;</a>

                <?php

            }
        } else {
            if ($currentPage < $pageCount) {
                ?>

                <a href="javascript:;" title="ابتدا">&laquo; ابتدا</a>

                <a href="javascript:;" title="صفحه قبلی">&laquo; صفحه قبلی</a>

                <?php

                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }

                    ?>

                    <a href="<?= ($i != $currentPage ? $webaddress . 'PG-' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>" title="<?= $i ?>"><?= $i ?></a>

                    <?php

                }

                ?>

                <a href="<?= $webaddress ?>PG-<?= $currentPage + 1 ?>" title="صفحه بعدی">صفحه بعدی &raquo;</a>

                <a href="<?= $webaddress ?>PG-<?= $pageCount ?>" title="انتها">انتها &raquo;</a>

                <?php

            } else {
                ?>

                <a href="javascript:;" title="ابتدا">&laquo; ابتدا</a>

                <a href="javascript:;" title="صفحه قبلی">&laquo; صفحه قبلی</a>

                <?php

                for ($i = $currentPage - 2; $i < $currentPage + 3; ++$i) {
                    if ($i < 1 || $i > $pageCount) {
                        continue;
                    }

                    ?>

                    <a href="<?= ($i != $currentPage ? $webaddress . 'PG-' . $i : 'javascript:;') ?>"
                            class="number <?= ($i != $currentPage ? '' : 'current') ?>" title="<?= $i ?>"><?= $i ?></a>

                    <?php

                }

                ?>

                <a href="javascript:;" title="صفحه بعدی">صفحه بعدی &raquo;</a>

                <a href="javascript:;" title="انتها">انتها &raquo;</a>

                <?php

            }
        }

        //echo $currentPage . "/" . $pageCount . "صفحه مجموع: " . $totalRecord . " رکورد";

        ?>

    </div> <!-- End .pagination -->

    <div class="clear"></div>

    <?php

}

function showErrorMsg($msg)
{
    global $conn;

    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/title.inc.php';

    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/system.error.php';

    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/tail.inc.php';

    die();
}

function showAdminErrorMsg($msg)
{
    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/admin.title.inc.php';

    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/system.error.php';

    include ROOT_DIR . 'templates/' . CURRENT_SKIN . '/admin.tail.inc.php';

    die();
}

function showAlertMsg($msg)
{
    if ($msg != '') {
        ?>
        <div class="alert border">
            <a href="#" class="close" style="display:block"><img
                        src="<?php echo RELA_DIR ?>templates/<?php echo CURRENT_SKIN ?>/images/alert.png" align="left"
                        title="Close this notification" alt="close"/></a> <span><?= $msg ?></span>
        </div>

        <?php

    }
}

function showWarningMsg($msg)
{
    if ($msg) {
        ?>
        <div class="notification error png_bg">
            <a class="close" href="#"><img alt="close" title="Close this notification"
                        src="<?= TEMPLATE_DIR ?>admin/images/cross_grey_small.png"></a>
            <div>
                <?= $msg ?>
            </div>
        </div>

        <?php

    }
}

function showMsg($redirect)
{
    if ($redirect) {
        ?>
        <div class="notification png_bg">
            <div class="success">
                <a href="#" class="close"><img
                            src="<?php echo RELA_DIR ?>templates/<?php echo CURRENT_SKIN ?>/admin/images/icons/cross_grey_small.png"
                            title="Close this notification" alt="close"/></a>
                <div>
                    <?= $redirect ?>
                </div>
            </div>
        </div>
        <?php

    }
}

function showWarningMsg1($msg)
{
    if ($msg) {
        ?>

        <div class="fadeout"><?php echo $msg ?></div>

        <?php

    }
}

//*********************************************Alizadeh***************************************************************
function monthToYear($month)
{
    if ($month >= 12) {
        $year = intval($month / 12);
        $month = $month % 12;
        $result = $year . ' Year ';
        if ($month != 0) {
            $result = $result . ' .  ' . $month . ' Month ';
        }
    } else {
        $result = $month . ' Month ';
    }

    return $result;
}

function mobileChecker($prefix, $number)
{
    if ($prefix == '+964') {
        if (strlen($number) != 10) {
            $return['result'] = -1;
            $return['msg'] = 'Please enter your mobile number correctly.';
        }
    } else {
        $return['result'] = 1;
        $return['msg'] = 'ok';
    }

    return $return;
}

function ipChecker($ip)
{
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $return['result'] = -1;
        $return['msg'] = 'IP is not valid.';
    } else {
        $return['result'] = 1;
        $return['msg'] = 'IP is valid';
    }

    return $return;
}

//************************************************************************************************************
function encrypt($string, $key)
{
    $result = '';
    for ($i = 0; $i < strlen($string); ++$i) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, $i % strlen($key) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }

    return base64_encode($result);
}

function decrypt($string, $key)
{
    $result = '';
    $string = base64_decode($string);

    for ($i = 0; $i < strlen($string); ++$i) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }

    return $result;
}

function showAccessError()
{
    //$path=$_SERVER['HTTP_REFERER'];
    $path = RELA_DIR . 'admin';
    ?>

    <script type="text/javascript">
        alert('you dont have proper permissions');
        window.location = '<?php echo $path ?>';
    </script>

    <?php
    die();
}

function checkPermissions($action, $component)
{
    global $admin_info;
    // $admin_permission=$admin_info['permission'];
    include_once ROOT_DIR . 'model/admin.permission.class.php';
    $PagePermission = getAllPermisssion();
    //echo "<pre>";print_r($PagePermission);die();
    //$script = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);
    $admin_permission = $admin_info['permission'];
    //$newObj=unserialize($PagePermission[$script]);
    $newObj = $PagePermission[$component];

    unset($PagePermission);
    $return = $newObj->check($action, $admin_permission);

    if ($return['result'] != 1) {
        showAccessError();
    }

    return 1;
}

function checkPermissionsUI($pageName, $action)
{
    global $admin_info;
    //print_r($admin_info);die('sevjppeml;');
    $admin_permission = $admin_info['permission'];
    ///print_r($admin_info);die('ftyftg');
    ///echo $pageName,$action;die('wefopk;wef');
    include_once ROOT_DIR . 'model/admin.permission.class.php';

    $PagePermission = getAllPermisssion();

    $newObj = $PagePermission[$pageName];

    unset($PagePermission);

    $return = $newObj->check($action, $admin_permission);
    //print_r($return);die('iiiiiiiiiuj');
    if ($return['result'] != 1) {
        return 0;
    }

    return 1;
}

function get_group_info_date($p_id)
{
    global $conn, $member_info, $lang;
    $sql = "select * from  internet_detail  where product_id ='$p_id' ";

    $internet_detail_rs = $conn->Execute($sql);
    if (!$internet_detail_rs) {
        $return['result'] = 0;
        $return['err'] = '400';
        $return['msg'] = 'DB Error';

        return $return;
    }

    $return['result'] = 1;
    $return['err'] = '0';
    $return['msg'] = 'successful';
    $return['rs'] = $internet_detail_rs->fields;
    //echo '<pre/>';
    //print_r($return);
    //die();
    return $return;
}

function print_r_debug($data)
{
    echo '<pre style="direction: ltr">';
    print_r($data);
    die();
}

function get_cities()
{
    include_once ROOT_DIR . 'component/city/model/city.model.db.php';
    $cities = cityModelDb::getCities()['export']['list'];

    return $cities;
}

function get_Provinces()
{
    include_once ROOT_DIR . 'component/province/model/province.model.db.php';
    $provinces = provinceModelDb::getProvinces()['export']['list'];

    return $provinces;
}


//*********************************************vahed***************************************************************

function paginationButtom($recordCount = 0, $countButtom = 10, $pageSize = PAGE_SIZE)
{
    global $page, $PARAM;

    if ((settype($pageSize, "integer")) <= 0) {
        $pageSize = 10;
    }

    if ($pageSize <= 0 || trim($pageSize) == '') {
        return $result['result'] = 1;
    }
    if (($countButtom != 0) and ($recordCount != 0)) {
        $pageCount = ceil($recordCount / PAGE_SIZE);
        $pagination = array();
        $pAddress = implode('/', $PARAM);
        $pAddress .= '/';

        if (!isset($page)) {
            $page = 1;
        }

        $fPagination = 0;
        $lPagination = 0;

        $num = $countButtom;
        if ($pageCount < $num) {
            $fPagination = 1;
            $lPagination = $pageCount;
            $nPage = false;
            $pPage = false;
        } elseif ($page == 1) {
            $fPagination = 1;
            $lPagination = $num;
            $nPage = true;
            $pPage = false;
        } elseif (($pageCount == $page)) {
            $fPagination = $pageCount - ($num - 1);
            $lPagination = $pageCount;
            $nPage = false;
            $pPage = true;
        } else {
            $fPagination = $page - floor($num / 2);
            if (($num % 2) == 0) {
                $lPagination = $page + ((floor($num / 2)) - 1);
            } else {
                $lPagination = $page + ((floor($num / 2)));
            }
            $nPage = true;
            $pPage = true;
            if ($fPagination <= 0) {
                $fPagination = 1;
                $lPagination = $num;
            } elseif ($pageCount < $lPagination) {
                $fPagination = $pageCount - (($num - 1));
                $lPagination = $pageCount;
            }
        }

        for ($i = $fPagination; $i <= $lPagination; $i++) {
            if (($i == $fPagination) and ($pPage == true)) {
                $pagination[] = [address => $pAddress . 'page/' . ($page - 1), label => ">", number => $i];
                $pPage == false;
            }
            if ($page == $i) {
                $activePage = " activePage";
            } else {
                $activePage = "";
            }
            $pagination[] = [address => $pAddress . 'page/' . $i, number => $i, label => $i, "activePage" => $activePage];
            if (($i == $lPagination) and ($nPage == true)) {
                $pagination[] = [address => $pAddress . 'page/' . ($page + 1), label => "<", number => $i];
                $pPage == false;
            }
        }
    } else {
        $result['result'] = -1;
        $result['export']['list'] = '';

        return $result;
    }
    $result['result'] = 1;
    $result['export']['list'] = $pagination;
    $result['export']['pageCount'] = $pageCount;
    $result['export']['rowCount'] = $recordCount;

    //print_r_debug($pageCount);
    return $result;
}

function fileUploader($input = array(), $file = array())
{
    $msg = "";
    //check type of Image
    $new_name = '';
    if (isset($input['new_name'])) {
        $new_name = $input['new_name'];
    } else {
        $new_name = basename($file["name"]);
    }

    //check type of Image
    if (isset($input['type'])) {
        $input['type'] = strtolower($input['type']);
        $type = explode(',', $input['type']);
    } else {
        $type = array('jpg', 'jpeg', 'mp4', 'mp3');
    }

    //check size of Image
    if (isset($input['max_size'])) {
        $maxSize = $input['max_size'];
    } else {
        $maxSize = '2048000';  //max size is 2 MB
    }

    //check size of Image
    if (isset($input['upload_dir'])) {
        $target_dir = $input['upload_dir'];
    } else {
        $target_dir = $input['upload_dir'];
    }

    //Create directory
    $dirs = "";
    if (!(is_dir($target_dir))) {

        $dir = explode("/", $target_dir);

        foreach ($dir as $value) {

            //if($value != ""){
            if ((is_dir($dirs . $value)) != 1) {
                mkdir($dirs . $value);

                $dirs .= $value . "/";
            } else {
                $dirs .= $value . "/";
            }
            //}
        }

    }

    if (isset($input['height'])) {
        $height = $input['height'];
    } else {
        $height = '';
    }

    if (isset($input['wight'])) {
        $wight = $input['wight'];
    } else {
        $wight = '';
    }

    if (isset($input['error_msg'])) {
        $error_msg = $input['error_msg'];
    } else {
        $error_msg = "بارگذاری فایل با مشکل مواجه شد";
    }

    if (isset($input['success_msg'])) {
        $success_msg = $input['success_msg'];
    } else {
        $success_msg = "The file " . basename($file["name"]) . " has been uploaded.";
    }

    $target_file = $target_dir . (strtotime("now") . "._" . $new_name);


    $result['image_name'] = (strtotime("now") . "._" . $new_name);

    $uploadOk = 1;

    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nameFile = ((str_ireplace("." . $fileType, "", $file["name"])) . "._" . strtotime("now") . "." . $fileType);
    $check = getimagesize($file["tmp_name"]);


    //Check if file already exists
    if (file_exists($target_file)) {
        $result['msg']['error'] = "این فایل از قبل وجود دارد";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > $maxSize) {
        $result['msg']['error'] = "حجم عکس مورد نظر حداکثر باید ۲ مگابایت باشد";
        $uploadOk = 0;
    }

    if (!in_array($fileType, $type)) {
        $result['msg']['error'] = "پسوند عکس نامعتبر است";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $result['msg']['error_msg'] = $error_msg;
        $result['result'] = "-1";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $result['msg']['success_msg'] = $success_msg;
            $result['result'] = "1";
        } else {
            $result['msg']['error_msg'] = $error_msg;
            $result['result'] = "-1";
        }
    }

    return $result;
}

if (isset($_FILES['galery_image'])) {

    $Property = array('type' => 'jpg,png,jpeg',
        'new_name' => $_FILES['galery_image']['name'],
        'max_size' => '2048000',
        'upload_dir' => GALARY_IMAGE_ROOT . "/galary/",
        'height' => '',
        'wight' => '',
        'error_msg' => '',
        'success_msg' => '',
    );


    $result_uploader = fileUploader($Property, $_FILES['galery_image']);
}

function fileRemover($dir, $fileName)
{
    if (trim($fileName) != '') {
        if (file_exists($dir . $fileName)) {
            unlink($dir . $fileName);
            $result['result'] = "1";
            $result['msg'] = "file removed.";
        } else {
            $result['result'] = "-1";
            $result['msg'] = "Sorry, file not exists.";
        }
    } else {
        $result['result'] = "-1";
        $result['msg'] = "Sorry, file name is empety.";
    }
}
/*
function getPackageUsage($user_id)
{

    include_once ROOT_DIR . 'component/packageUsage/admin/model/admin.packageUsage.controller.php';
    $packageObject = New adminPackageUsageController();
    $package = $packageObject->getPackageByCompanyID($user_id);

    return $package;

}*/

//end vahed

function arrayToTag($input)
{
    $export = '';
    if (count($input) > 0) {
        $export = implode(',', $input);
        $export = ',' . $export . ',';
    }
    $result ['export']['list'] = $export;
    $result['result'] = '1';

    return $result;
}

function tagToArray($input)
{
    $export = explode(',', $input);
    $export = array_filter($export, 'strlen');
    $result ['export']['list'] = $export;
    $result['result'] = '1';

    return $result;
}

/*function is_user($user_id)
{
    include_once ROOT_DIR . 'component/company/admin/model/admin.company.model.php';
    $company = admincompanyModel::find($user_id);
    if (($company->username == '') | ($company->password) == '') {
        return -1;
    } else {
        return 1;
    }
}*/



/**
 * @param $input
 * @return mixed
 */
function convertToEnglish($input)
{
    $persian = array('۰', '۱', '۲', '۳', '٤', '٥', '٦', '۷', '۸', '۹');
    $arabic = array('٠', '١', '٢', '٣', '۴', '۵', '۶', '٧', '٨', '٩');
    $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    $str = str_replace($persian, $english, $input);
    $string = str_replace($arabic, $english, $str);

    return $string;
}

/*function calculateScoreCompany($user_id)
{
    require_once ROOT_DIR . "model/Rate.php";
    $company = company::find($user_id);

    if (is_object($company)) {
        $rate = new Rate($company);
        $rate->calculation();
    }
}*/



