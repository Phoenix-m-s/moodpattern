<?php
include_once dirname(__FILE__) . '/controller/motivationcontroller.php';
global  $company_info, $PARAM;
$motivationcontroller = new motivationcontroller();

if (isset($exportType)) {
    $motivationcontroller->exportType = $exportType;
}
//checklogin
if($company_info ==-1 and $_SESSION['email']==''){
    redirectPage(RELA_DIR . "index/", $company_info['msg']);
    die();
}

switch ($_GET['action']) {
    case 'add':
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $motivationcontroller->store($_POST);
        } else {
            $motivationcontroller->create();
        }
        break;
    case 'edit':
        //print_r_debug($_POST);
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $motivationcontroller->update($_POST);
        } else {
            $id = $_GET['id'];
            $motivationcontroller->edit($id);
        }
        break;

    case 'show' :
        $id = $_GET['id'];
        $motivationcontroller->show($id);
        break;
    case 'delete':
        $id = $_GET['del_id'];
        $motivationcontroller->destroy($id);
        break;
    case 'export':
        $motivationcontroller->excel_export();
        break;
    default:
        $motivationcontroller->index();
        break;
}