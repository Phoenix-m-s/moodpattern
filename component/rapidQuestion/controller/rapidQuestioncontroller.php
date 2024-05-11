<?php

/*model*/
include_once ROOT_DIR . "component/topic/model/topicmodel.php";
include_once ROOT_DIR . "component/chart/model/chartmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class rapidQuestioncontroller
 */
class rapidQuestioncontroller
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
     * fromIndexcontroller constructor.
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
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform_new.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform_new.inc.php");
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
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_privileges']) || $_SESSION['user_privileges'] != 1){
            $msg = '<h4 style="text-align: center;color: red;"> کاربر مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
        //print_r_debug($_SESSION);
        $topic = topicmodel::getAll();
        $topic->where('scoring_method','=',2);
        $result=$topic->getList();

        $this->exportType = 'html' ;
        $export['list'] = $result['export']['list'];
        $this->fileName = 'listrapidtopic.php';
        $this->template($export, '');
        die();
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
        $this->fileName = 'rapidQuestion.php';
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
        $error = array() ;
        if(!isset($_SESSION['user_id'])){
            $error[] = 'کاربر مشخص نمی باشد.' ;
        }
        if(!isset($_POST['title']) || strlen($_POST['title']) == 0 || !isset($_POST['topic_type']) || $_POST['topic_type'] == '0' ){
            $error[] = 'موضوع و یا نوع گراف مشخص نشده است.' ;
        }
        if(count($error)>0) {
            $export['list']['input'] = $_input;
            $export['list']['ERR'] = 1;
            $export['list']['ERR-MSG'] = $error;
            $this->fileName = 'rapidQuestion.php';
            $this->template($export, '');
            die();
        }
        //print_r_debug($_input);
        $_input['users_id'] = $_SESSION['user_id'];
        $_input['scoring_method'] = 2 ;
        $topic = new topicmodel();
        $topic->setFields($_input);
        $result = $topic->save();
        if ($result['result'] == -1 ) {
            $msg = 'عملیات با موفقیت انجام نشد';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }
        $lastId = $result['export']['insert_id'] ;
        $positiveSens = array(8,7,5,3,1) ;
        $negativeSens = array(10,9,6,4,2) ;
        $chartmodel = new chartmodel() ;
        $chartFields = array() ;
        $chartFields['user_topic_id'] = $lastId ;
        foreach($positiveSens as $k=>$v){
            // store score A
            $chartFields['approach'] = 1 ;
            $chartFields['sensore_id'] = $v ;
            $var = 'A'.$v ;
            $chartFields['score_sum'] = $_input[$var] ;
            $chartmodel->setFields($chartFields);
            $result = $chartmodel->save();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
            // store score C
            $chartFields['approach'] = 2 ;
            $chartFields['sensore_id'] = $v ;
            $var = 'C'.$v ;
            $chartFields['score_sum'] = $_input[$var] ;
            $chartmodel->setFields($chartFields);
            $result = $chartmodel->save();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
        }
        foreach($negativeSens as $k=>$v){
            // store score B
            $chartFields['approach'] = 1 ;
            $chartFields['sensore_id'] = $v ;
            $var = 'B'.$v ;
            $chartFields['score_sum'] = $_input[$var] ;
            $chartmodel->setFields($chartFields);
            $result = $chartmodel->save();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
            // store score D
            $chartFields['approach'] = 2 ;
            $chartFields['sensore_id'] = $v ;
            $var = 'D'.$v ;
            $chartFields['score_sum'] = $_input[$var] ;
            $chartmodel->setFields($chartFields);
            $result = $chartmodel->save();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
        }
        $topic = new topicmodel();
        $resulttopic = $topic::find($lastId);
        $topicFields['save_graph'] = 1 ;
        $resulttopic->setFields($topicFields);
        $result = $resulttopic->save();
        if ($result['result'] == -1 ) {
            $msg = 'عملیات ثبت امکان مشاهده تحلیل گراف حسی با موفقیت انجام نشد.';
            redirectPage(RELA_DIR . 'topic/', $msg);
            die();
        }
        $msg = '<h4 style="text-align: center;color: #4bff35;">تحلیل گراف حسی را مشاهده نمایید</h4>';
        redirectPage(RELA_DIR . 'chart/?topicId='.$lastId, $msg,1);
        die();
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
        $topic = topicmodel::find($id);
        if ( !is_object($topic) ) {
            $msg = 'موضوع مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'register/?action=edit', $msg,1);
            die();
        }
        $positiveSens = array(8,7,5,3,1) ;
        $negativeSens = array(10,9,6,4,2) ;
        $export['list']['input']['title'] = $topic->title ;
        $export['list']['input']['topic_type'] = $topic->topic_type ;
        $chart = new chartmodel();
        $fields = array('where'=>'user_topic_id='.$topic->id);
        $result_chart = $chart->getByFilter($fields);
        //print_r_debug($result_chart);
        $sensoreScore = array() ;
        foreach($result_chart['export']['list'] as $k=>$v){
            $sensoreScore[$v['approach']][$v['sensore_id']] = $v['score_sum'] ;
        }
        foreach($positiveSens as $k=>$v){
            $var = 'A'.$v ;
            $export['list']['input'][$var] = $sensoreScore[1][$v] ;
            $var = 'C'.$v ;
            $export['list']['input'][$var] = $sensoreScore[2][$v] ;
        }
        foreach($negativeSens as $k=>$v){
            $var = 'B'.$v ;
            $export['list']['input'][$var] = $sensoreScore[1][$v] ;
            $var = 'D'.$v ;
            $export['list']['input'][$var] = $sensoreScore[2][$v] ;
        }
        $export['list']['input']['action'] = 'edit' ;
        $export['list']['input']['topic_id'] = $topic->id ;
        //print_r_debug($export['list']['input']);
        $msg = '';
        $this->fileName = 'rapidQuestion.php';
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
        $error = array() ;
        if(!isset($_POST['topic_id'])){
            $error[] = 'موضوع مشخص نمی باشد.' ;
        }
        if(count($error)>0) {
            $export['list']['input'] = $_input;
            $export['list']['input']['action'] = 'edit';
            $export['list']['ERR'] = 1;
            $export['list']['ERR-MSG'] = $error;
            $this->fileName = 'rapidQuestion.php';
            $this->template($export, '');
            die();
        }
        //print_r_debug($_input);
        $positiveSens = array(8,7,5,3,1) ;
        $negativeSens = array(10,9,6,4,2) ;
        $chartmodel = new chartmodel() ;
        $chartFields = array() ;
        foreach($positiveSens as $k=>$v){
            // store score A
            $var = 'A'.$v ;
            $chartObj = chartmodel::getBy_user_topic_id_and_approach_and_sensore_id($_POST['topic_id'],1,$v)->first();
            $chartObj->score_sum = $_input[$var] ;
            $chartObj->save();
            // store score C
            $var = 'C'.$v ;
            $chartObj = chartmodel::getBy_user_topic_id_and_approach_and_sensore_id($_POST['topic_id'],2,$v)->first();
            $chartObj->score_sum = $_input[$var] ;
            $chartObj->save();
        }
        foreach($negativeSens as $k=>$v){
            // store score B
            $var = 'B'.$v ;
            $chartObj = chartmodel::getBy_user_topic_id_and_approach_and_sensore_id($_POST['topic_id'],1,$v)->first();
            $chartObj->score_sum = $_input[$var] ;
            $chartObj->save();
            // store score D
            $var = 'D'.$v ;
            $chartObj = chartmodel::getBy_user_topic_id_and_approach_and_sensore_id($_POST['topic_id'],2,$v)->first();
            $chartObj->score_sum = $_input[$var] ;
            $chartObj->save();
        }
        $msg = '<h4 style="text-align: center;color: #4bff35;">تحلیل گراف حسی را مشاهده نمایید</h4>';
        redirectPage(RELA_DIR . 'chart/?topicId='.$_POST['topic_id'], $msg,1);
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
        $register = topicmodel::find(2);
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
        $register = new topicmodel();
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
