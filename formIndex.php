<?php
include_once 'server.inc.php';
include_once ROOT_DIR.'common/db.inc.php';
include_once ROOT_DIR.'common/init.inc.php';
include_once ROOT_DIR.'common/func.inc.php';
include_once ROOT_DIR.'common/looeic.php';
include_once ROOT_DIR.'component/formIndex/controller/fromIndexcontroller.php';


$fromIndex = new fromIndexcontroller();
//print_r_debug($_POST);
switch ($_GET['action']) {

    case 'add':
        if (isset($_POST['action']) & $_POST['action'] == 'store') {

            $fromIndex->store($_POST);
        } else {
            $fromIndex->create($_POST);
        }
        break;
    default:
        $fromIndex->show('', '', '');
        break;
}

