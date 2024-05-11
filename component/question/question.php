<?php

include_once dirname(__FILE__) . '/controller/questioncontroller.php';

global $company_info, $PARAM;
//print_r_debug($_SESSION);
$questioncontrol = new questioncontroller();

if (isset($exportType)) {
    $questioncontrol->exportType = $exportType;
}
//checklogin

if($company_info ==-1 and $_SESSION['email']==''){
    redirectPage(RELA_DIR . "index/", $company_info['msg']);
    die();
}

$action = (isset($_GET['action'])?$_GET['action']:(isset($_POST['action'])?$_POST['action']:''));
switch ($action) {
    case 'add':
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $questioncontrol->store($_POST);
        } else {
            $questioncontrol->create();
        }
        break;
    case 'saveGraph':
        if (isset($_POST['action']) && $_POST['action'] == 'saveGraph' && isset($_POST['user_topics_id'])) {
            $questioncontrol->saveGraph($_POST['user_topics_id']);
        }else{
            $msg = '<h4 style="text-align: center;color: red;">ثبت تحلیل گراف حسی به درستی انجام نگرفته است</h4>';
            redirectPage(RELA_DIR . 'topic/', $msg);
            break;
        }
        break;
    default:
        $questioncontrol->index();
        break;
}