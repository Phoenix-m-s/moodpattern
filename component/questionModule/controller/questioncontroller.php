<?php
/*model*/
include_once ROOT_DIR . "component/question/model/questionmodel.php";
include_once ROOT_DIR . "component/question/model/sensormodel.php";
include_once ROOT_DIR . "component/question/model/wordmodel.php";
include_once ROOT_DIR . "component/topic/model/topicmodel.php";
include_once ROOT_DIR . "component/question/model/wordscoremodel.php";
include_once ROOT_DIR . "component/chart/model/chartmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

class questioncontroller
{
    public $exportType = 'html';
    public $fileName;
    public $questionmodel;

    public function __construct()
    {
        $this->questionmodel = new questionmodel();
        $this->exportType = 'html';
    }

    public function template($list = [], $msg = '')
    {
        switch ($this->exportType) {
            case 'html':
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform.title.inc.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform.inc.php");
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
        $approach = (isset($_REQUEST['approach'])?$_REQUEST['approach']:1);
        if(isset($_REQUEST['topicId'])) {
            $topic = new topicmodel();
            $result_topic = $topic::find($_REQUEST['topicId']);
            if (is_object($result_topic) ) {
                $topic_info =  $result_topic->fields ;
            }
            if(isset($topic_info['id'])) {
                $sensor = new sensormodel();
                $word = new wordmodel();


                $fields = array('order' => array('priority_word' => 'ASC'));
                $result_sensor = $sensor->getByFilter($fields);
                $fields = array('order' => array('priority' => 'ASC'),'where' => 'topic_type='.$topic_info['topic_type']);
                $result_word = $word->getByFilter($fields);
                $sensor_word = array();
                foreach($result_word['export']['list'] as $k=>$v){
                    $sensor_word[$v['sensory_sensors_id']][] = array('word_id'=>$v['id'],'word_title'=>$v['words']);
                }
                //print_r_debug($sensor_word);
                $export['list']['sensor'] = $result_sensor['export']['list'];
                $export['list']['sensor_words'] = $sensor_word;
                $export['list']['topic'] =$topic_info ;
                $export['list']['approach'] = $approach ;
                //print_r_debug($export);
                //if($approach==1){
                    //$this->fileName = 'stepform.php';
                //}elseif($approach==2){
                    //$this->fileName = 'stepform2.php';
                //}
                //print_r_debug($export);
                $this->fileName = 'stepform.php';
                $this->template($export, '');
            }else{
                redirectPage(RELA_DIR . 'topic/?action=add','موضوع یافت نشد.');
            }
        }else{
            $msg = '<h4 style="text-align: center;color: #4cff22;">  خوش آمدید به بخش ماموریت گراف های حسی</h4>';

            redirectPage(RELA_DIR . 'topic/?action=add',$msg);
        }
    }

    public function create()
    {

    }

    public function store($_input)
    {
        //print_r_debug($_input);
        $approach = (isset($_input['approach'])?$_input['approach']:'') ;
        $user_topics_id = (isset($_input['user_topics_id'])?$_input['user_topics_id']:'') ;
        if(strlen($approach)>0 && strlen($user_topics_id)>0) {
            $topic = new topicmodel();
            $result_topic = $topic::find($user_topics_id);
            if (is_object($result_topic) ) {
                $topic_info =  $result_topic->fields ;
            }
            if(!isset($topic_info['id'])) {
                $msg = '<h4 style="text-align: center;color: red;">  موضوع مشخص نمی باشد.</h4>';

                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
            $sensor = new sensormodel();
            $word = new wordmodel();
            $fields = array('order' => array('priority_word' => 'ASC'));
            $result_sensor = $sensor->getByFilter($fields);
            //print_r_debug($result_sensor);
            $sensor_sum = array() ;
            foreach($result_sensor['export']['list'] as $k=>$v) {
                $score_word_sum = 0 ;
                $fields = array('order' => array('priority' => 'ASC'),'where' => 'sensory_sensors_id='.$v['id'].' and topic_type='.$topic_info['topic_type']);
                $result_word = $word->getByFilter($fields);
                foreach($result_word['export']['list'] as $k2=>$v2){
                    $wordscoremode = new wordscoremodel() ;
                    $wordSensoreFields = array() ;
                    $score = (isset($_input[$v2['id']])?$_input[$v2['id']]:0);
                    $wordSensoreFields['sensor_words_id'] = $v2['id'];
                    $wordSensoreFields['user_topics_id'] = $user_topics_id;
                    $wordSensoreFields['score'] = $score;
                    $wordSensoreFields['approach'] = $approach;
                    $wordscoremode->setFields($wordSensoreFields);
                    $result = $wordscoremode->save();
                    if ($result['result'] == -1 ) {
                        $msg = '<h4 style="text-align: center;color: red;">  عملیات با موفقیت انجام نشد</h4>';
                        redirectPage(RELA_DIR . 'questionModule/?lastId='.$user_topics_id, $msg);
                        die();
                    }
                    if($score == 4){
                        $score_word_sum = 12 ;
                    }else{
                        $score_word_sum += $score ;
                    }
                }
                $score_word_sum = (($score_word_sum!=12 && $score_word_sum>10)?10:$score_word_sum) ;
                $sensor_sum[$v['id']] = $score_word_sum ;
                $chartmodel = new chartmodel() ;
                $chartFields = array() ;
                $chartFields['user_topic_id'] = $user_topics_id ;
                $chartFields['approach'] = $approach ;
                $chartFields['sensore_id'] = $v['id'] ;
                $chartFields['score_sum'] = $score_word_sum ;
                $chartmodel->setFields($chartFields);
                $result = $chartmodel->save();
                if ($result['result'] == -1 ) {
                    $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                    redirectPage(RELA_DIR . 'questionModule/?lastId='.$user_topics_id, $msg);
                    die();
                }
            }
            //print_r_debug($sensor_sum);
            if($approach==1){
                $msg = '<h4 style="text-align: center;color: #4bff35;"> لطفا رویکرد مخالف را تکمیل نمایید</h4>';
                //$this->fileName = 'questionModule.php';
                //$export['list']['topicId'] = $user_topics_id ;
                //$export['list']['approach'] = 2 ;
                //$this->template($export, $msg);
                redirectPage(RELA_DIR . 'questionModule/?topicId='.$user_topics_id.'&approach=2', $msg);
                die();
            }elseif($approach==2){
                $msg = '<h4 style="text-align: center;color: #4bff35;">لطفا تحلیل گراف  حسی رو مشاهده نمایید</h4>';
                //$this->fileName = 'chart.php';
                //$export['list']['topicId'] = $user_topics_id ;
                //$this->template($export, '');
                redirectPage(RELA_DIR . 'chart/?topicId='.$user_topics_id,$msg);
                die();
            }
        }else{
            $msg = '<h4 style="text-align: center;color: #4bff35;">موضوع و یا رویکرد مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add');
        }

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
