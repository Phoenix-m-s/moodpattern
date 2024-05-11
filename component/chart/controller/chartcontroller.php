<?php

/*model*/
include_once ROOT_DIR . "component/question/model/sensormodel.php";
include_once ROOT_DIR . "component/topic/model/topicmodel.php";
include_once ROOT_DIR . "component/chart/model/chartmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

class chartcontroller
{
    public $exportType = 'html';
    public $fileName;
    public $chartmodel;

    public function __construct()
    {
        $this->chartmodel = new chartmodel();
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
        if(isset($_REQUEST['topicId'])) {
            $topic = new topicmodel();
            $result_topic = $topic::getAll();
            $result_topic->where('id','=',$_REQUEST['topicId']);
            if($_SESSION['user_privileges']!=1) {
                $result_topic->where('users_id','=',$_SESSION['user_id']);
            }
            $result_topic = $result_topic->getList();
            $topic_info = (isset($result_topic['export']['list'][0])?$result_topic['export']['list'][0]:'') ;
            //print_r_debug($topic_info);
            if(strlen($topic_info['id'])>0 && $topic_info['save_graph']==1) {
                $sensor = new sensormodel();
                $chart = new chartmodel();

                $fields = array('order' => array('priority_graph' => 'ASC'));
                $result_sensor = $sensor->getByFilter($fields);
                $fields = array('where'=>'user_topic_id='.$topic_info['id']);
                $result_chart = $chart->getByFilter($fields);
                $sensor_score = array();
                foreach($result_chart['export']['list'] as $k=>$v){
                    $sensor_score[$v['approach']][$v['sensore_id']] = $v['score_sum'];
                }
                $export['list']['sensor'] = $result_sensor['export']['list'];
                $export['list']['score'] = $sensor_score;
                $export['list']['topic'] = $topic_info ;
                //print_r_debug($topic_info);
                //$this->fileName = 'chart.php';
                if($topic_info['topic_type'] == 2){
                    $this->fileName = 'chart_new_relation_2.php';
                }else {
                    $this->fileName = 'chart_new_2.php';
                }
                $this->template($export, '');
                //$this->fileName = "chart.php";
                //$this->template($this->fileName);
            }else{
                $msg = '<h4 style="text-align: center;color: red;">برای مشاهده گراف، ابتدا باید امتیاز دهی واگویه ها را کامل و سپس کلید ذخیره نهایی را انتخاب نمایید.</h4>';
                redirectPage(RELA_DIR . 'topic/',$msg);
            }
        }else{
            $msg = '<h4 style="text-align: center;color: red;">موضوع نادرست می باشد</h4>';
            redirectPage(RELA_DIR . 'topic/',$msg);
        }
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
