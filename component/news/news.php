<?php
/**
 * Created by PhpStorm.
 * User: daba
 * Date: 02-Oct-16
 * Time: 10:51 AM
 */
include_once ROOT_DIR . "component/news/controller/news.controller.php";

global $admin_info, $PARAM;

$newsController = new newsController();

if (isset($exportType)) {
    $newsController->exportType = $exportType;
}

switch ($_GET['action']) {
    case 'addnews':
        //checkPermissions('addAdmin', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $newsController->store($_POST);
        } else {
            $newsController->create($_POST);
        }
        break;
    case 'editnews':
        //checkPermissions('editAdmin', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $newsController->update($_POST);
        } else {
            $input['admin_id'] = $_GET['id'];
            $newsController->edit($input);
        }
        break;

    case  "shownews" :
        //checkPermissions('showList', 'admin');
        if (isset($_POST['action']) & $_POST['action'] == 'setAdminTask') {
            $_POST['admin_id']=$_GET['admin_id'];
            $newsController->setAdminTask($_POST);
        } else {

            $newsController->showSetTask($_GET);
        }
        break;

    case 'deletenews':
        //checkPermissions('showList', 'admin');
        $input['news_id'] = $_GET['id'];
        $newsController->destory($input);
        break;

    default:
        $fields['order']['admin_id'] = 'DESC';
        $newsController->index($fields);
        break;
}