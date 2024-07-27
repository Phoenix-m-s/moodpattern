<?php

include_once dirname(__FILE__) . '/controller/registercontroller.php';

global  $admin_info, $PARAM;

$registercontroller = new registercontroller();

if (isset($exportType)) {
    $registercontroller->exportType = $exportType;
}
switch ($_GET['action']) {
    case 'add':
        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            //die('b');
            $registercontroller->store($_POST);
        } else {
            //die('n');
            $registercontroller->create();
        }
        break;
    case 'edit':
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $registercontroller->update($_POST);
        } else {
            $id = $_GET['id'];
            $registercontroller->edit($id);
        }
        break;

    case 'show' :
        $id = $_GET['id'];
        $registercontroller->show($id);
        break;

    case 'delete':
        $id = $_GET['id'];
        $registercontroller->destroy($id);
        break;

    default:
        $registercontroller->index();
        break;
}