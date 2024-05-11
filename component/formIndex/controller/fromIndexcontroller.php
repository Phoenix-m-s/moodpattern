<?php

/*model*/
include_once ROOT_DIR . "component/formIndex/model/formIndexmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class fromIndexcontroller
 */
class fromIndexcontroller
{
    /**
     * @var string
     */
    public $exportType = 'html';
    /**
     * @var
     */
    public $fileName;
    /**
     * @var formIndexmodel
     */
    public $formIndexmodel;

    /**
     * fromIndexcontroller constructor.
     */
    public function __construct()
    {
        $this->formIndexmodel = new formIndexmodel();
        $this->exportType = 'html';
    }

    /**
     * @param array $list
     * @param string $msg
     */
    public function template($list = [], $msg = '')
    {
        switch ($this->exportType) {
            case 'html':
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/header.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/footer.php");
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

    /**
     *
     *
     *show form register
     *
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function index()
    {
        $this->fileName = "formIndex.php";
        $this->template($this->fileName);
    }


    /**
     *
     *
     *show form add for register
     *
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function create()
    {
        $this->fileName = "circle.php";
        $this->template($this->fileName);
        die();
    }

    /**
     *
     * store user fortable users.
     *
     *
     * @param $_input
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     */

    public function store($_input)
    {
        die('1');
    }

    /**
     *
     *
     * show user with id.
     *
     * @param $id
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function show($id)
    {

        $this->fileName = 'formIndex.php';
        $this->template($this->fileName , '');
        die();
    }


    /**
     *
     *
     * for edit form users.
     *
     * @param $id
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function edit($id)
    {
        $register = formIndexmodel::find($id);
        if ( !is_object($register) ) {
            $msg = 'صفحه مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'register/?action=edit', $msg);
            die();
        }
        $export = $register->fields;
        echo '<pre>';
        print_r($export);
        die();
        $msg = 'صفحه مورد نظر یافت شد';
        $this->fileName = '';
        $this->template($export, $msg);
        die();
    }

    /**
     *
     *
     * update user.
     * @param $_input
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function update($_input)
    {
        $register = formIndexmodel::find($_input['id']);
        if ( !is_object($register) ) {
            $msg = 'صفحه مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'register/?action=edit', $msg);
            die();
        }
        $register->setFields($_input);
        $result = $register->save();
        if ($result['result'] == - 1 ) {
            $msg = 'عملیات با موفقیت انجام نشد';
            redirectPage(RELA_DIR . 'register/?action=add', $msg);
            die();
        }
        $msg = 'عملیات با موفقیت انجام شد';
        redirectPage(RELA_DIR . 'register/?action=add', $msg);
        die();

    }


    /**
     *
     *
     * destroy user with id.
     *
     * @param $id
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function destroy($id)
    {
        $register = formIndexmodel::find(2);
        if ( !is_object($register) ) {
            $msg = 'صفحه مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'register/', $msg);
            die();
        }
        $register->delete();
        $msg = 'عملیات با موفقیت انجام شد';
        redirectPage(RELA_DIR . 'register', $msg);
        die();
    }

    /**
     *
     *
     * listuser show data all insert in to table users.
     *
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2019-09-22
     * @version 0.0.1
     *
     *
     */
    public function listuser()
    {
        $register = new formIndexmodel();
        $result = $register->getList();
        if ( $result['result'] != '1' ) {
            $this->fileName = '';
            $this->template('', $result['msg']);
            die();
        }
        $export['list'] = $result['export']['list'];
        echo '<pre>';
        print_r($export);
        die();

    }


}
