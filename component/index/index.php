<?php
include_once("server.inc.php");
include_once(ROOT_DIR . "common/db.inc.php");
include_once(ROOT_DIR . "common/init.inc.php");
include_once(ROOT_DIR . "common/func.inc.php");
include_once(ROOT_DIR . "model/db.inc.class.php");
include_once dirname(__FILE__) . '/controller/indexcontroller.php';

global  $company_info, $PARAM;


$loginController = new indexController();

if ( isset($exportType) ) {
    $loginController->exportType = $exportType;
}



if ( $PARAM['0'] == 'index' & $PARAM['1'] == null ) {

    if ( isset($_POST['action']) & $_POST['action'] == 'login' ) {

        $loginController->login($_POST);
        die();

    }

    $loginController->index();
}


/*if ( $PARAM['0'] == 'index' & $PARAM['1'] =='?action=logout') {

    if ( isset($_GET['action']) & $_GET['action'] == 'logout' ) {

        $loginController->logout();


    }

    $loginController->index();
}*/

switch ($PARAM[1]) {


    case 'logout' :
        $loginController->logout();
        break;
    case 'sendEmail' :
        $loginController->sendEmail($_POST['mobile']);
        break;

    case 'getUsername' :
        $loginController->getUsernameForm();
        break;

    case 'newPassword' :
        $loginController->savePassword($_POST);
        break;

    case 'getNewPassword' :
        $loginController->getNewPasswordForm($PARAM[2]);
        break;
}


