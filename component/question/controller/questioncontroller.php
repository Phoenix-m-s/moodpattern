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
        $approach = (isset($_REQUEST['approach'])?$_REQUEST['approach']:1);
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
//                if($topic_info['save_graph']==1){
//                    $msg = '<h4 style="text-align: center;color: red;">شما مجاز به ویرایش اطلاعات نمی باشید</h4>';
//                    redirectPage(RELA_DIR . 'topic/',$msg);
//                }
                $sensor = new sensormodel();
                $word = new wordmodel();
                $wordScore = new wordscoremodel() ;
                //fetch sensors
                $fields = array('order' => array('priority_word' => 'ASC'));
                $result_sensor = $sensor->getByFilter($fields);
                //fetch words
                $word_type = 0 ;
                if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4){
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
                //fetch last score
                $result_wordScore = $wordScore::getAll();
                $result_wordScore->where('user_topics_id','=',$topic_info['id']);
                $result = $result_wordScore->getList();
                $lastScore = array() ;
                foreach($result['export']['list'] as $k=>$v) {
                    $lastScore[$v['approach']][$v['sensor_words_id']] = $v['score'] ;
                }
                //print_r_debug($lastScore);
                $sumScore[1] = $this->calculatScore($topic_info['id'],1) ;
                $sumScore[2] = $this->calculatScore($topic_info['id'],2) ;
/////////////////////////////////////////////////////////////
                $export['list']['sensor'] = $result_sensor['export']['list'];
                $export['list']['sensor_words'] = $sensor_word;
                $export['list']['topic'] =$topic_info ;
                $export['list']['approach'] = $approach ;
                $export['list']['last_score'] = $lastScore ;
                $export['list']['sum_score'] = $sumScore ;
                //print_r_debug($export);
                $this->fileName = 'stepform1.php';
                //$this->fileName = 'rengslider.php';
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
        $approach = (isset($_input['approach'])?$_input['approach']:'') ;
        $user_topics_id = (isset($_input['user_topics_id'])?$_input['user_topics_id']:'') ;
//        if($_input['save_final']==1){
//            $this->saveGraph($user_topics_id);
//            die();
//        }
        if(strlen($approach)>0 && strlen($user_topics_id)>0) {
            $topic = new topicmodel();
            $result_topic = $topic::getAll();
            $result_topic->where('id','=',$user_topics_id);
            if($_SESSION['user_privileges']!=1) {
                $result_topic->where('users_id','=',$_SESSION['user_id']);
            }
            $result_topic = $result_topic->getList();
            $topic_info = (isset($result_topic['export']['list'][0])?$result_topic['export']['list'][0]:'') ;
            if(strlen($topic_info['id'])==0) {
                $msg = '<h4 style="text-align: center;color: red;">  موضوع مشخص نمی باشد.</h4>';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
            $wordScore = new wordscoremodel() ;
            $result_wordScore = $wordScore::getAll();
            $result_wordScore->where('user_topics_id','=',$topic_info['id']);
            $resultLastScore = $result_wordScore->getList();
            $lastScore = array() ;
            foreach($resultLastScore['export']['list'] as $k=>$v) {
                $lastScore[$v['approach']][$v['sensor_words_id']] = $v['id'] ;
            }
            //print_r_debug($lastScore);
            $sensor = new sensormodel();
            $word = new wordmodel();
            $fields = array('order' => array('priority_word' => 'ASC'));
            $result_sensor = $sensor->getByFilter($fields);
            foreach($result_sensor['export']['list'] as $k=>$v) {
                //echo '<pre>';print_r($v);
                $word_type = 0 ;
                if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4){
                    $word_type = 1 ;
                }elseif($topic_info['topic_type']==2){
                    $word_type = 2;
                }
                $fields = array('order' => array('priority' => 'ASC'),'where' => 'sensory_sensors_id='.$v['id'].' and topic_type='.$word_type);
                $result_word = $word->getByFilter($fields);
                foreach($result_word['export']['list'] as $k2=>$v2){
                    //echo '<pre>';print_r($v2);
                    $wordSensoreFields = array() ;
                    if(isset($_input[$v2['id']]) && !isset($lastScore[$approach][$v2['id']])) {
                        //die('3') ;
                        //echo 'insert:'.$v2['id'].'<br>';
                        $wordSensoreFields['sensor_words_id'] = $v2['id'];
                        $wordSensoreFields['user_topics_id'] = $user_topics_id;
                        $wordSensoreFields['score'] = $_input[$v2['id']];
                        $wordSensoreFields['approach'] = $approach;
                        $wordScore->setFields($wordSensoreFields);
                        //echo '<pre>';print_r($wordSensoreFields);
                        $result = $wordScore->save();
                    }elseif(isset($lastScore[$approach][$v2['id']])){
                        if(!isset($_input[$v2['id']])) {
                            //die('1') ;
                            //echo 'delete:'.$lastScore[$approach][$v2['id']].'<br>';
                            $resultLastScore = $wordScore::find($lastScore[$approach][$v2['id']]);
                            $result = $resultLastScore->delete();
                        }else{
                            //die('2') ;
                            //echo 'update:'.$v2['id'].','.$lastScore[$approach][$v2['id']].'<br>';
                            $resultLastScore = $wordScore::find($lastScore[$approach][$v2['id']]);
                            $wordSensoreFields['score'] = $_input[$v2['id']];
                            $resultLastScore->setFields($wordSensoreFields);
                            $result = $resultLastScore->save();
                        }
                    }
                    if ($result['result'] == -1 ) {
                        $msg = '<h4 style="text-align: center;color: red;">  عملیات با موفقیت انجام نشد</h4>';
                        redirectPage(RELA_DIR . 'question/?lastId='.$user_topics_id, $msg);
                        die();
                    }
                }
            }
            /////////////////////////////////Save Final //////////////
            if($_input['save_final']==1){
                $this->saveGraph($user_topics_id);
                die();
            }
            /////////////////////////////////////////////////////////
            if(isset($_input['save_temp']) && $_input['save_temp']==1){
                $msg = '<h4 style="text-align: center;color: #4bff35;">لطفا امتیازدهی رو تکمیل نمایید</h4>';
                redirectPage(RELA_DIR . 'question/?topicId=' . $user_topics_id . '&approach='.$approach, $msg);
                die();
            }else {
                if ($approach == 1) {
                    $msg = '<h4 style="text-align: center;color: #4bff35;"> لطفا رویکرد مخالف را تکمیل نمایید</h4>';
                    redirectPage(RELA_DIR . 'question/?topicId=' . $user_topics_id . '&approach=2', $msg);
                    die();
                } elseif ($approach == 2) {
                    $msg = '<h4 style="text-align: center;color: #4bff35;">در صورتی که از بیان درست ارزش های حسی خود مطمئن هستید، برای مشاهده تحلیل گراف حسی خود بر روی دکمه «ذخیره نهایی» کلیک نمایید</h4>';
                    redirectPage(RELA_DIR . 'question/?topicId=' . $user_topics_id . '&approach=1', $msg);
                    die();
                }
            }
        }else{
            $msg = '<h4 style="text-align: center;color: #4bff35;">موضوع و یا رویکرد مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add');
        }

    }
    public function calculatScore($user_topics_id,$approach){
        if(strlen($user_topics_id)>0) {
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
            $sensorScores = array() ;
            $wordScore = new wordscoremodel() ;
            $result_wordScore = $wordScore::getAll();
            $result_wordScore->where('user_topics_id','=',$user_topics_id);
            $result_wordScore->where('approach','=',$approach);
            $resultLastScore = $result_wordScore->getList();
            //print_r_debug($resultLastScore);
            $sensor = new sensormodel();
            $word = new wordmodel();
            $word_type = 0 ;
            if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4){
                $word_type = 1 ;
            }elseif($topic_info['topic_type']==2){
                $word_type = 2;
            }
            $fields = array('where' => 'topic_type='.$word_type);
            $result_word = $word->getByFilter($fields);
            $lastScore = array() ;
            foreach($resultLastScore['export']['list'] as $k=>$v) {
                $lastScore[$v['sensor_words_id']] = $v['score'] ;
            }
            $fields = array('order' => array('priority_word' => 'ASC'));
            $result_sensor = $sensor->getByFilter($fields);
            foreach($result_sensor['export']['list'] as $k=>$v) {
                $max = 0 ;
                $others = 0 ;
                $score_word_sum = 0 ;
                $word_type = 0 ;
                if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4){
                    $word_type = 1 ;
                }elseif($topic_info['topic_type']==2){
                    $word_type = 2;
                }
                $fields = array('order' => array('priority' => 'ASC'),'where' => 'sensory_sensors_id='.$v['id'].' and topic_type='.$word_type);
                $result_word = $word->getByFilter($fields);
                //print_r_debug($result_word);
                if ($result_word['result'] == -1 ) {
                    die('WORD-ERR');
                }
                //print_r_debug($result_word);
                foreach($result_word['export']['list'] as $k2=>$v2){
                    if(isset($lastScore[$v2['id']])) {
                        if ($lastScore[$v2['id']] == 11) {
                            $score_word_sum = 11;
                            //exit();
                        }else {
                            $max = ($lastScore[$v2['id']] > $max ? $lastScore[$v2['id']] : $max);
                            if ($lastScore[$v2['id']] != 0) {
                                $others++;
                            }
                        }
                    }
                }
                if($score_word_sum <> 11 && $max <> 0){
                    $max = $max+($others-1) ;
                }
                $score_word_sum = ($score_word_sum==11?11:($max>=9?9:$max)) ;
                $sensorScores[$v['id']] = $score_word_sum ;
            }
            //print_r_debug($sensorScores) ;
            return $sensorScores ;
        }else{
            $msg = '<h4 style="text-align: center;color: red;">موضوع مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add');
        }

    }
    public function saveGraph($user_topics_id)
    {
        if(strlen($user_topics_id)>0) {
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
            $wordScore = new wordscoremodel() ;
            $result_wordScore = $wordScore::getAll();
            $result_wordScore->where('user_topics_id','=',$user_topics_id);
            $resultLastScore = $result_wordScore->getList();
            //print_r_debug($resultLastScore);
            $sensor = new sensormodel();
            $word = new wordmodel();
            $word_type = 0 ;
            if($topic_info['topic_type'] == 1 || $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 4){
                $word_type = 1 ;
            }elseif($topic_info['topic_type']==2){
                $word_type = 2;
            }
            $fields = array('where' => 'topic_type='.$word_type);
            $result_word = $word->getByFilter($fields);
            //approach1+approach2
            $countWord = $result_word['export']['recordsCount'] + $result_word['export']['recordsCount'];
            $countWordScore = $resultLastScore['export']['recordsCount'] ;
            //echo 'countWord='.$countWord.'<br>'.'countWordScore='.$countWordScore;die('test');
            if($countWord != $countWordScore){
                $msg ='<h4 style="text-align: center;color: red;">امتیازدهی واگویه ها ناقص است، لطفا واگویه ها را مجدد برای تکمیل امتازدهی کنترل نمایید.</h4>' ;
                redirectPage(RELA_DIR . 'question/?topicId='.$user_topics_id.'&approach=1', $msg,1);
                die();
            }
            $sensorScore = $this->calculatScore($user_topics_id,1) ;
            foreach($sensorScore as $k=>$v) {
                $chartmodel = new chartmodel() ;
                $chartFields = array() ;
                $chartFields['user_topic_id'] = $user_topics_id ;
                $chartFields['approach'] = 1 ;
                $chartFields['sensore_id'] = $k ;
                $chartFields['score_sum'] = $v ;
                $chartmodel->setFields($chartFields);
                $result = $chartmodel->save();
                if ($result['result'] == -1 ) {
                    $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                    redirectPage(RELA_DIR . 'topic/', $msg);
                    die();
                }
            }
            $sensorScore = $this->calculatScore($user_topics_id,2) ;
            foreach($sensorScore as $k=>$v) {
                $chartmodel = new chartmodel() ;
                $chartFields = array() ;
                $chartFields['user_topic_id'] = $user_topics_id ;
                $chartFields['approach'] = 2 ;
                $chartFields['sensore_id'] = $k ;
                $chartFields['score_sum'] = $v ;
                $chartmodel->setFields($chartFields);
                $result = $chartmodel->save();
                if ($result['result'] == -1 ) {
                    $msg = 'عملیات ثبت چارت با موفقیت انجام نشد.';
                    redirectPage(RELA_DIR . 'topic/', $msg);
                    die();
                }
            }
            $topic = new topicmodel();
            $resulttopic = $topic::find($user_topics_id);
            $topicFields['save_graph'] = 1 ;
            $resulttopic->setFields($topicFields);
            $result = $resulttopic->save();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات ثبت امکان مشاهده تحلیل گراف حسی با موفقیت انجام نشد.';
                redirectPage(RELA_DIR . 'topic/', $msg);
                die();
            }
            $msg = '<h4 style="text-align: center;color: #4bff35;">تحلیل گراف حسی را مشاهده نمایید</h4>';
            redirectPage(RELA_DIR . 'chart/?topicId='.$user_topics_id, $msg,1);
            die();
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
