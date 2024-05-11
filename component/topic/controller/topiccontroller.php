<?php

/*model*/
include_once ROOT_DIR . "component/topic/model/topicmodel.php";
include_once ROOT_DIR . "component/topic/model/topictypeclassmodel.php";
/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class topiccontroller
 */
class topiccontroller
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
     * @var topicmodel
     */
    public $topicmodel;

    /**
     * topiccontroller constructor.
     */
    public function __construct()
    {
        $this->topicmodel = new topicmodel();
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
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform.title.inc.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform.inc.php");
                break;
           case 'newhtml':
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

    /**
     *
     *
     *show form topic
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
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_privileges'])){
            $msg = '<h4 style="text-align: center;color: red;"> کاربر مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
        $topic = topicmodel::getAll();
        //print_r_debug($_SESSION);
//        $title = $_POST['title'] ;
//        $topicType = '' ;
//        if(isset($_POST['topic_type'])){
//            $topicType = $_POST['topic_type'] ;
//        }
//        if(strlen($title)>0) {
//            $topic->where('title','like','%'.$title.'%');
//            //$where .= ' and'." title like '%".$title."%'" ;
//        }
//        if(strlen($topicType)>0){
//            $topic->where('topic_type','=',$topicType);
//        }
        if($_SESSION['user_privileges']!=1) {
            $topic->where('users_id','=',$_SESSION['user_id']);
        }
        $topic->where('scoring_method','=',1);
        $result=$topic->getList();

        $this->exportType = 'newhtml' ;
        $export['list'] = $result['export']['list'];
        $this->fileName = 'listtopic.php';
        $this->template($export, '');
        die();
    }
    /**
     *
     *
     *show form add for topic
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
        $topicclass = new topictypeclassmodel() ;
        $result = $topicclass::getAll();
        $result = $result->getList();
        if ($result['result'] == -1 ) {
            $msg = '<h4 style="text-align: center;color: red;">دریافت دسته بندی موضوع با خطا مواجه شده است</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }
        $topicclass = array() ;
        foreach($result['export']['list'] as $k=>$v){
            $topicclass[$v['class_type']][] = array('id'=>$v['id'],'title'=>$v['title']) ;
        }
        $export['list']['topic_class'] = $topicclass;
        //$this->fileName = 'topic.php';
        $this->fileName = 'new_topic.php';
        $this->template($export, '');
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
        if(!isset($_SESSION['user_id'])){
            $msg = '<h4 style="text-align: center;color: red;"> کاربر مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
        if(!isset($_POST['title']) || strlen($_POST['title']) == 0){
            $msg = '<h4 style="text-align: center;color: red;">عنوان موضوع مشخص نشده است.</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg,1);
            die();
        }
        //print_r_debug($_input);
//        if($_input['topic_type'] == 1){
//            $_input['topic_type'] = 1 ;
//            $_input['verb_type'] = 1 ;
//            $_input['topic_type_class_id'] = $_input['topic_class_1'] ;
//        }elseif($_input['topic_type'] == 2){
//            $_input['topic_type'] = 1 ;
//            $_input['verb_type'] = 2 ;
//            $_input['topic_type_class_id'] = $_input['topic_class_1'] ;
//        }elseif($_input['topic_type'] == 3){
//            $_input['topic_type'] = 2 ;
//            $_input['verb_type'] = 1 ;
//            $_input['topic_type_class_id'] = $_input['topic_class_2'] ;
//        }
        elseif($_input['topic_type'] == 1 || $_input['topic_type'] == 3 || $_input['topic_type'] == 4 || $_input['topic_type'] == 5 || $_input['topic_type'] == 6){
            if(strlen($_input['topic_class_1'])>0) {
                $_input['topic_type_class_id'] = $_input['topic_class_1'];
            }
        }elseif($_input['topic_type'] == 2){
            if(strlen($_input['topic_class_2'])>0) {
                $_input['topic_type_class_id'] = $_input['topic_class_2'];
            }
        }
        //print_r_debug($_input);
//        if(!isset($_input['topic_type_class_id']) || strlen($_input['topic_type_class_id'])==0){
//            $msg = '<h4 style="text-align: center;color: red;">نوع فعالیت یا رابطه انتخاب نشده است</h4>';
//            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
//            die();
//        }
        $_input['users_id'] = $_SESSION['user_id'];

        $topic = new topicmodel();
        $topic->setFields($_input);
        $result = $topic->save();
        //print_r_debug($result);
        if ($result['result'] == -1 ) {
            $msg = 'عملیات با موفقیت انجام نشد';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }


//      $result = $topic->select('MAX(id)');
//      $lastId = $result->fields['id'] ;
        $lastId = $result['export']['insert_id'] ;

//        if($_input['scoring_method']==1){
//            $msg = '<h4 style="text-align: center;color: #60ff35;">  عملیات با موفقیت انجام شد</h4>';
//            redirectPage(RELA_DIR . 'question/?topicId='.$lastId.'&approach=1', $msg);
//        }elseif($_input['scoring_method']==2){
//            $msg = '<h4 style="text-align: center;color: #60ff35;">  عملیات با موفقیت انجام شد</h4>';
//            redirectPage(RELA_DIR . 'questionModule/?topicId='.$lastId.'&approach=1', $msg);
//        }
        $msg = '<h4 style="text-align: center;color: #60ff35;">  عملیات با موفقیت انجام شد</h4>';
        redirectPage(RELA_DIR . 'questionrange2/?topicId='.$lastId.'&approach=1', $msg);
        die();
    }

    public function helpform(){
        $this->fileName = 'help_form.php' ;
        $this->template('','');
        die();
    }
}
