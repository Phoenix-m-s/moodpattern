<?php
/*model*/
include_once ROOT_DIR . "component/404/model/notFound.model.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

class notFoundcontroller
{
    public $exportType = 'html';
    public $fileName;
    public $notfoundmodel;

    public function __construct()
    {
        $this->notfoundmodel = new notFoundmodel();
    }

    public function template($list = [], $msg = '')
    {
        switch ($this->exportType) {
            case 'html':
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/title.inc.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/tail.inc.php");
                break;

            case 'json':
                echo json_encode($list);
                break;

            case 'array':
                print_r_debug($list);
                break;

            case 'serialize':
                echo serialize($list);
                break;

            default:
                break;
        }

    }



    public function index()
    {
        $this->fileName = "404.php";
        $this->template($this->fileName);
    }


    public function create()
    {

    }

    public function store($_input)
    {
    }

    public function show($id)
    {
    }


    public function edit($id)
    {

    }

    public function update($_input)
    {

    }


    public function destroy($id)
    {

    }


}
