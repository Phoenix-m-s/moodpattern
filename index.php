<?php
include_once 'server.inc.php';
include_once ROOT_DIR.'common/db.inc.php';

include_once ROOT_DIR.'common/init.inc.php';

include_once ROOT_DIR.'common/func.inc.php';
include_once ROOT_DIR.'model/db.inc.class.php';
include_once ROOT_DIR.'common/looeic.php';

global $admin_info,$PARAM;

//$url_main = substr($_SERVER['REQUEST_URI'], strlen(SUB_FOLDER) + 1);
$url_main = substr($_SERVER['REQUEST_URI'], strlen(SUB_FOLDER) );
$url_main = urldecode($url_main);

if (strlen($url_main) == 0) {
    $url_main = INDEX_URL;
}
$PARAM = explode('/', $url_main);
$PARAM = array_filter($PARAM, 'strlen');


$componenetAdress = ROOT_DIR."component/{$PARAM['0']}/{$PARAM['0']}.php";
//die($componenetAdress);
//die($componenetAdress);
if (!file_exists($componenetAdress)) {
    $componenetAdress = ROOT_DIR.'component/404/404.php';
}

include_once $componenetAdress;