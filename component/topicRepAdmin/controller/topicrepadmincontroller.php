<?php

/*model*/
include_once ROOT_DIR . "component/topicRepAdmin/model/topicrepadminmodel.php";
/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class topiccontroller
 */
class topicrepadmincontroller
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
    public $admintopicreportmodel;

    /**
     * topiccontroller constructor.
     */
    public function __construct()
    {
        $this->admintopicreportmodel = new topicrepadminmodel();
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
        $topic = topicrepadminmodel::getAll();
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
        //$topic->where('scoring_method','=',1);
        $result=$topic->getList();

        $this->exportType = 'newhtml' ;
        $export['list'] = $result['export']['list'];
        $this->fileName = 'adminTopicRep.php';
        $this->template($export, '');
        die();
    }

}
