<?php

include_once dirname(__FILE__) . '/controller/fromIndexcontroller.php';

global  $admin_info, $PARAM;

$fromIndexcontroller = new fromIndexcontroller();

/*if (isset($exportType)) {
    $fromIndexcontroller->exportType = $exportType;
}*/
print_r_debug("ss");
switch ($_GET['action']) {

    case 'show' :
        $id = $_GET['id'];
        $fromIndexcontroller->show($id);
        break;

    default:
        $fromIndexcontroller->index();
        break;
}