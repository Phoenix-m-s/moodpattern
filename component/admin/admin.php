<?php
/**
 * Created by PhpStorm.
 * User: daba
 * Date: 02-Oct-16
 * Time: 10:51 AM
 */
include_once ROOT_DIR . "component/admin/controller/admin.admin.controller.php";

global $admin_info, $PARAM;

$adminController = new adminAdminController();

if (isset($exportType)) {
    $adminController->exportType = $exportType;
}

switch ($_GET['action']) {
    case 'addAdmin':
        //checkPermissions('addAdmin', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $adminController->addAdmin($_POST);
        } else {
            $adminController->showAdminAddForm($_POST);
        }
        break;
    case 'editAdmin':
        //checkPermissions('editAdmin', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $adminController->editAdmin($_POST);
        } else {
            $input['admin_id'] = $_GET['id'];
            $adminController->showAdminEditForm($input);
        }
        break;

    case  "showSetTask" :
        //checkPermissions('showList', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'setAdminTask') {
            $_POST['admin_id']=$_GET['admin_id'];
            $adminController->setAdminTask($_POST);
        } else {

            $adminController->showSetTask($_GET);
        }
        break;

    case 'deleteAdmin':
        //checkPermissions('showList', 'admin');
        $input['admin_id'] = $_GET['id'];
        $adminController->deleteAdmin($input);
        break;
    case 'editProfileAdmin':
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $adminController->editAdmin($_POST);
        } else {
            $adminController->showAdminEditForm($input);
        }

    default:
        $fields['order']['admin_id'] = 'DESC';
        $adminController->showList($fields);
        break;
}