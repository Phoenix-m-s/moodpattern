<?php
global  $company_info, $PARAM;
include_once dirname(__FILE__) . '/controller/chartcontroller.php';

global  $company_info, $PARAM;
$chartcontroller = new chartcontroller();

if (isset($exportType)) {
    $chartcontroller->exportType = $exportType;
}
//checklogin

if($company_info ==-1 and $_SESSION['email']==''){
    redirectPage(RELA_DIR . "index/", $company_info['msg']);
    die();
}
switch ($_GET['action']) {
    case 'create':

        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $chartcontroller->store($_POST);
        } else {
            $chartcontroller->create();
        }
        break;

    case 'destroy':
        $input['id'] = $_GET['id'];
        $chartcontroller->destroy($input);
        break;
    case 'edit':
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $chartcontroller->update($_POST);
        } else {
            $chartcontroller->edit($input);
        }
        break;
    default:
        $chartcontroller->index();
        break;
}