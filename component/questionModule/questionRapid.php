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

        if (isset($_POST['action']) & $_POST['action'] == 'add') {
            $questioncontrol->store($_POST);
        } else {
            $questioncontrol->create();
        }
        break;

    case 'destroy':
        $input['id'] = $_GET['id'];
        $questioncontrol->destroy($input);
        break;
    case 'edit':
        if (isset($_POST['action']) & $_POST['action'] == 'edit') {
            $questioncontrol->update($_POST);
        } else {
            $questioncontrol->edit($input);
        }
        break;

    default:
        $questioncontrol->index();
        break;
}