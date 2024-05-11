<?php




include_once ROOT_DIR . "component/index/model/indexmodel.php";


class adminIndexController
{
    public $exportType = 'html';
    public $fileName;
    public $companyModel;

    public function __construct()
    {
        $this->companyModel = new indexmodel();
    }

    function template($list = [], $msg)
    {
        switch ($this->exportType) {
            case 'html':

                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/template_start.php";
                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/template_header.php";
                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/template_rightMenu_admin.php";
                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName";
                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/template_footer.php";
                include ROOT_DIR . "templates/" . CURRENT_SKIN . "/template_end.php";
                break;

            case 'json':
                echo json_encode($list);
                break;
            case 'array':
                return $list;
                break;

            case 'serialize':
                echo serialize($list);
                break;
            default:
                break;
        }

    }

}
