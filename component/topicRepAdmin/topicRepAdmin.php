<?php
include_once dirname(__FILE__) . '/controller/topicrepadmincontroller.php';
global  $company_info, $PARAM;
$topiccontroller = new topicrepadmincontroller();

if (isset($exportType)) {
    $topiccontroller->exportType = $exportType;
}
//checklogin
if($company_info ==-1 and $_SESSION['email']==''){
    redirectPage(RELA_DIR . "index/", $company_info['msg']);
    die();
}

switch ($_GET['action']) {
    case 'add':
       //
        break;
    case 'edit':
        //
        break;

    case 'show' :
        //
        break;
    case 'delete':
        //
        break;
    case 'help':
        $topiccontroller->helpform();
        break;
    default:
        $topiccontroller->index();
        break;
}