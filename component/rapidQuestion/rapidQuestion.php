<?php

include_once dirname(__FILE__) . '/controller/rapidQuestioncontroller.php';

global  $company_info, $PARAM;
//checklogin
if($company_info ==-1 and $_SESSION['email']==''){
    redirectPage(RELA_DIR . "index/", $company_info['msg']);
    die();
}
$rapidQuestioncontroller = new rapidQuestioncontroller();

if (isset($exportType)) {
    $rapidQuestioncontroller->exportType = $exportType;
}
switch ($_GET['action']) {
    case 'add':
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            //die('b');
            $rapidQuestioncontroller->store($_POST);
        } else {
            //die('n');
            $rapidQuestioncontroller->create();
        }
        break;
    case 'edit':
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
            $rapidQuestioncontroller->update($_POST);
        }else {
            $id = $_GET['id'];
            $rapidQuestioncontroller->edit($id);
        }
        break;
    default:
        $rapidQuestioncontroller->index();
        break;
}