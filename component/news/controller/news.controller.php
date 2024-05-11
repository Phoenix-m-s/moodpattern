<?php
include_once ROOT_DIR . "component/news/model/news.model.php";

class newsController
{
    public $exportType;

    public $fileName;

    public function __construct()
    {
        $this->exportType = 'html';
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

    public function index( $fields )
    {
        $news = new newsmodel();
        $result = $news->getByFilter();
        if ( $result['result'] != '1' ) {
            $this->fileName = 'news.index.php';
            $this->template('', $result['msg']);
            die();
        }
        $export['list'] = $result['export']['list'];
        $export['recordCount'] = $result['export']['recordCount'];
        $this->fileName = 'admin.admin.showList.php';
        $this->template($export);
    }

    public function create( $fields, $msg )
    {
        $this->fileName = 'news.create.php';
        $this->template($fields, $msg);
        die();
    }

    public function store($fields)
    {

        $news = new newsmodel();
        $result = $news->setFields($fields);
        $news->save();
        if ( $result['result'] == - 1 ) {
            return $result;
        }
        if ( $result['result'] != '1' ) {
            $this->index($fields, $result['msg']);
        }
        $msg = 'عملیات با موفقیت انجام شد';
        redirectPage(RELA_DIR . 'news/index.php?component=news', $msg);
        die();
    }

    public function update( $fields )
    {
     /*   $news1 = newsmodel::getBy_username_and_not_admin_id($fields['username'],$fields['admin_id'])->first();

        if ( $news1->admin_id != '' ) {
            $msg = 'نام کاربری وجود دارد';
            $this->edit($fields, $msg);
        }*/

        $news = newsmodel::find($fields['admin_id']);
        if ( $fields['password'] != '' ) {
            $fields['password'] = md5($fields['password']);
        } else {
            $fields['password'] = $news->password;
        }
        //print_r_debug($fields);
        $news->setFields($fields);
        $news->save();
        $msg = 'عملیات با موفقیت انجام شد';
        redirectPage(RELA_DIR . 'news/index.php?component=news', $msg);
        die();
    }

    public function edit( $fields, $msg )
    {
        global $news_info;
        if($fields['news_id']=='')
        {
            $fields['news_id']= $news_info['news_id'];

        }
        //print_r_debug($news_info);
        $news = newsmodel::find($fields['news_id']);
        if ( !is_object($news) ) {
            $msg = 'صفحه مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'admin/index.php?component=news&action=editnews', $msg);
        }
        $export = $news->fields;
        $this->fileName = 'admin.admin.editForm.php';
        $this->template($export, $msg);
        die();
    }

    public function destory($id)
    {
        $news = newsmodel::find($id['news_id']);
        $news->delete();
        $msg = 'عملیات با موفقیت انجام شد';
        redirectPage(RELA_DIR . 'admin/index.php?component=admin', $msg);
    }

    function show( $input,$message )
    {

        global $conn, $news_info, $messageStack;
        $news_id = $input['admin_id'];
        $news_id = intval($news_id);

        $model = adminadminModel::getBy_news_id($news_id)->first();

        $list['PagePermission'] = getAllPermisssion();
        $list['adminInfo'] = $model->fields;
        $this->fileName = 'admin.adminlist.settask.php';
        $this->template($list);
        die();

    }

   


}