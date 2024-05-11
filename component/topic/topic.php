<?php
include_once dirname(__FILE__) . '/controller/topiccontroller.php';
global  $company_info, $PARAM;
$topiccontroller = new topiccontroller();

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
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $topiccontroller->store($_POST);
        } else {
            $topiccontroller->create();
        }
        break;
    case 'edit':
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $topiccontroller->update($_POST);
        } else {
            $id = $_GET['id'];
            $topiccontroller->edit($id);
        }
        break;

    case 'show' :
        $id = $_GET['id'];
        $topiccontroller->show($id);
        break;
    case 'delete':
        $id = $_GET['id'];
        $topiccontroller->destroy($id);
        break;
    case 'help':
        $topiccontroller->helpform();
        break;
    default:
        $topiccontroller->index();
        break;
}