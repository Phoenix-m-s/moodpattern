<?php
/*model*/
include_once ROOT_DIR . "component/questionrange/model/questionmodel.php";
include_once ROOT_DIR . "component/questionrange/model/sensormodel.php";
include_once ROOT_DIR . "component/questionrange/model/wordmodel.php";
include_once ROOT_DIR . "component/topic/model/topicmodel.php";
include_once ROOT_DIR . "component/questionrange/model/wordscoremodel.php";
include_once ROOT_DIR . "component/chart/model/chartmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

class questioncontrollerRange
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
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/stepform2_new.php");
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

    public function index()
    {
        $topicId = (isset($_REQUEST['topicId'])?$_REQUEST['topicId']:'') ;
        if(strlen($topicId)>0) {
            $topic = new topicmodel();
            $result_topic = $topic::getAll();
            $result_topic->where('id','=',$topicId);
            if($_SESSION['user_privileges']!=1) {
                $result_topic->where('users_id','=',$_SESSION['user_id']);
            }
            $result_topic = $result_topic->getList();
            $topic_info = (isset($result_topic['export']['list'][0])?$result_topic['export']['list'][0]:'') ;
            //print_r_debug($topic_info);
            if(strlen($topic_info['id'])>0) {
                if($topic_info['save_graph']==1){
                    $msg = '<h4 style="text-align: center;color: red;">شما مجاز به ویرایش اطلاعات نمی باشید</h4>';
                    redirectPage(RELA_DIR . 'topic/',$msg,1);
                }

                $sensor = new sensormodel();
                $word = new wordmodel();
                $wordScore = new wordscoremodel() ;
                //fetch sensors
                $fields = array('order' => array('priority_word' => 'ASC'));
                $result_sensor = $sensor->getByFilter($fields);
                //fetch words
                $word_type = 0 ;
                if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4 || $topic_info['topic_type'] == 5 || $topic_info['topic_type'] == 6){
                    $word_type = 1 ;
                }elseif($topic_info['topic_type']==2){
                    $word_type = 2;
                }
                $fields = array('order' => array('priority' => 'ASC'),'where' => 'topic_type='.$word_type);
                $result_word = $word->getByFilter($fields);
                $sensors = array() ;
                $sensor_word = array();
                foreach($result_sensor['export']['list'] as $k=>$v){
                    $sensors[$v['id']] = $v['title'] ;
                }
                foreach($result_word['export']['list'] as $k=>$v){
                    $sensor_word[$v['sensory_sensors_id']][] = array('word_id'=>$v['id'],'word_title'=>$v['words']);
                }
/////////////////////////////////////////////////////////////
                $export['list']['sensor'] = $result_sensor['export']['list'];
                $export['list']['sensor_words'] = $sensor_word;
                $export['list']['topic'] =$topic_info ;
                //print_r_debug($export);
                $this->fileName = 'stepform2-range.php';
                $this->template($export, '');
            }else{
                $msg = '<h4 style="text-align: center;color: red;">موضوع نادرست می باشد</h4>';
                redirectPage(RELA_DIR . 'topic/?action=add',$msg);
            }
        }else{
            $msg = '<h4 style="text-align: center;color: red;">موضوع مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add',$msg);
        }
    }

    public function create()
    {

    }

    public function store($_input)
    {
        //echo'test:';print_r_debug($_input);
        //print_r_debug($_SESSION);
        $user_topics_id = (isset($_input['user_topics_id'])?$_input['user_topics_id']:'') ;
        if(strlen($user_topics_id)>0) {
            $topic = new topicmodel();
            if($_SESSION['user_privileges']!=1) {
                $topicObj = $topic::getBy_id_and_users_id($user_topics_id,$_SESSION['user_id'])->first();
            }else{
                $topicObj = $topic::getBy_id($user_topics_id)->first();
            }
            if (!is_object($topicObj)) {
                $msg = '<h4 style="text-align: center;color: red;">  موضوع مشخص نمی باشد.</h4>';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }else {
                $sensor = new sensormodel();
                $fields = array('order' => array('priority_word' => 'ASC'));
                $result_sensor = $sensor->getByFilter($fields);
                foreach ($result_sensor['export']['list'] as $k => $v) {
                    $score1 = 0;
                    $score_large_scale1 = 0;
                    //print_r_debug($_input);
                    if (isset($_input['1_' . $v['id']])) {
                        $score_large_scale1 = $_input['1_' . $v['id']];
                        if (($_input['1_' . $v['id']] >= 5) && ($_input['1_' . $v['id']] <= 30)) {
                            $score1 = 1;
                        } elseif (($_input['1_' . $v['id']] > 30) && ($_input['1_' . $v['id']] <= 44)) {
                            $score1 = 3;
                        } elseif (($_input['1_' . $v['id']] > 44) && ($_input['1_' . $v['id']] <= 55)) {
                            $score1 = 5;
                        } elseif (($_input['1_' . $v['id']] > 55) && ($_input['1_' . $v['id']] <= 70)) {
                            $score1 = 7;
                        } elseif (($_input['1_' . $v['id']] > 70) && ($_input['1_' . $v['id']] <= 90)) {
                            $score1 = 9;
                        } elseif (($_input['1_' . $v['id']] > 90) && ($_input['1_' . $v['id']] <= 100)) {
                            $score1 = 11;
                        }
                        $chartmodel = new chartmodel();
                        $chartFields = array();
                        $chartFields['user_topic_id'] = $user_topics_id;
                        $chartFields['approach'] = 1;
                        $chartFields['sensore_id'] = $v['id'];
                        $chartFields['score_sum'] = $score1;
                        $chartFields['score_large_scale'] = $score_large_scale1;
                        //print_r_debug($chartFields);
                        $chartmodel->setFields($chartFields);
                        $result = $chartmodel->save();
                        if ($result['result'] == -1) {
                            $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                            redirectPage(RELA_DIR . 'topic/', $msg);
                            die();
                        }
                    }
                    $score2 = 0;
                    $score_large_scale2 = 0 ;
                    if (isset($_input['2_' . $v['id']])) {
                        $score_large_scale2 = $_input['2_' . $v['id']];
                        if (($_input['2_' . $v['id']] >= 5) && ($_input['2_' . $v['id']] <= 30)) {
                            $score2 = 1;
                        } elseif (($_input['2_' . $v['id']] > 30) && ($_input['2_' . $v['id']] <= 44)) {
                            $score2 = 3;
                        } elseif (($_input['2_' . $v['id']] > 44) && ($_input['2_' . $v['id']] <= 55)) {
                            $score2 = 5;
                        } elseif (($_input['2_' . $v['id']] > 55) && ($_input['2_' . $v['id']] <= 70)) {
                            $score2 = 7;
                        } elseif (($_input['2_' . $v['id']] > 70) && ($_input['2_' . $v['id']] <= 90)) {
                            $score2 = 9;
                        } elseif (($_input['2_' . $v['id']] > 90) && ($_input['2_' . $v['id']] <= 100)) {
                            $score2 = 11;
                        }
                        $chartmodel = new chartmodel();
                        $chartFields = array();
                        $chartFields['user_topic_id'] = $user_topics_id;
                        $chartFields['approach'] = 2;
                        $chartFields['sensore_id'] = $v['id'];
                        $chartFields['score_sum'] = $score2;
                        $chartFields['score_large_scale'] = $score_large_scale2;

                        $chartmodel->setFields($chartFields);
                        $result = $chartmodel->save();
                        if ($result['result'] == -1) {
                            $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                            redirectPage(RELA_DIR . 'topic/', $msg);
                            die();
                        }
                    }
                }
                // save topic info
                if (strlen($topicObj->topic_type_class_id) == 0) {
                    $topicObj->topic_type_class_id = 0;
                }
                $topicObj->save_graph = 1 ;
                $topicObj->save();
                $msg = '<h4 style="text-align: center;color: #4bff35;">تحلیل گراف حسی را مشاهده نمایید</h4>';
                redirectPage(RELA_DIR . 'chart/?topicId='.$user_topics_id, $msg,1);
                die();

            }
        }else{
            $msg = '<h4 style="text-align: center;color: red;">موضوع مشخص نمی باشد</h4>';
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
