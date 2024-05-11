<?php

/*model*/
include_once ROOT_DIR . "component/motivation/model/life_areasmodel.php";
include_once ROOT_DIR . "component/motivation/model/motivationmodel.php";
include_once ROOT_DIR . "component/motivation/model/motivational_phrases_areasmodel.php";
include_once ROOT_DIR . "component/motivation/model/motivational_listmodel.php";
/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class topiccontroller
 */
class motivationcontroller
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
        if($_SESSION['user_privileges']!=1 && $_SESSION['user_privileges']!=3) {
            $msg = '<h4 style="text-align: center;color: red;">شما به این بخش دسترسی ندارید</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
        $this->life_areasmodel = new life_areasmodel();
        $this->motivational_phrases_areasmodel = new motivational_phrases_areasmodel();
        $this->motivationmodel = new motivationmodel();
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
            case 'excel':
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                break;

            default:
                break;
        }

    }

    /**
     *
     *
     *show form motivational
     *
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2020-01-13
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
//        $motivation = new motivationmodel() ;
//        $fields = array('order' => array('reg_date' => 'ASC'));
//        if($_SESSION['user_privileges']!=1) {
//            $fields = array('where'=>'user_id','=',$_SESSION['user_id'].' or sample=1');
//        }
//        $result = $motivation->getByFilter($fields);
        $motivation = new motivationmodel() ;
        if($_SESSION['user_privileges']!=1) {
            $result = $motivation::getBy_user_id_or_sample($_SESSION['user_id'], 1)->getList();
        }else{
            $result = $motivation::getAll()->getList() ;
        }

        //echo 'result'.'<br>' ; print_r_debug($result);

        $this->exportType = 'newhtml' ;
        $export['list'] = $result['export']['list'];
        $this->fileName = 'listmotivation.php';
        $this->template($export, '');
        die();
    }
    /**
     *
     *
     *show form motivational
     *
     * @Email fheydarlou@icloud.com
     * @author fheydarlou@icloud.com
     * @date 2020-01-13
     * @version 0.0.1
     *
     *
     */
    public function excel_export()
    {
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_privileges']) || $_SESSION['user_privileges'] !=1){
            $msg = '<h4 style="text-align: center;color: red;"> کاربر مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
        $motivation = new motivational_listmodel() ;
//        if($_SESSION['user_privileges']!=1) {
//            $result = $motivation::getBy_user_id_or_sample($_SESSION['user_id'], 1)->getList();
//        }else{
//            $result = $motivation::getAll()->getList() ;
//        }
        $result = $motivation::getAll()->getList() ;
        foreach($result['export']['list'] as $k=>$v){
            $export['list'][$k]['id'] = $v['id'];
            $export['list'][$k]['title'] = $v['title'];
            $export['list'][$k]['phrase_fa'] = $v['phrase_fa'];
            $export['list'][$k]['phrase_en'] = $v['phrase_en'];
            $export['list'][$k]['author'] = $v['author'];
            $export['list'][$k]['fname'] = $v['fname'];
            $resultArea = $motivation->query('select GROUP_CONCAT(life_areas.title) life_area from motivational_phrases_areas left outer join life_areas on motivational_phrases_areas.id_life_areas = life_areas.id WHERE motivational_phrases_areas.id_motivational_phrases = '.$v['id'])->getList();
            $export['list'][$k]['life_area'] = $resultArea['export']['list'][0]['life_area'];
        }
        //print_r_debug($export);
        $this->exportType = 'excel' ;
        $export['list'] = $export['list'];
        $this->fileName = 'listexcelmotivation.php';
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
        $lifeAreas = new life_areasmodel();
        $result = $lifeAreas::getAll();
        $result = $result->getList();
        if ($result['result'] == -1 ) {
            $msg = '<h4 style="text-align: center;color: red;">دریافت ناحیه های زندگی با خطا مواجه شد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }
        $lifeAreas = array() ;
        foreach($result['export']['list'] as $k=>$v){
            $lifeAreas[$v['id']] = $v['title'] ;
        }
        //print_r_debug($lifeAreas);
        $export['list']['life_areas'] = $lifeAreas;
        $this->fileName = 'motivation.php';
        $this->template($export['list'], '');
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
        //print_r_debug($_input);
        if(!isset($_SESSION['user_id'])){
            $msg = '<h4 style="text-align: center;color: red;"> کاربر مشخص نمی باشد</h4>';
            redirectPage(RELA_DIR, $msg);
            die();
        }
//        if(!isset($_POST['title']) || strlen($_POST['title']) == 0){
//            $msg = '<h4 style="text-align: center;color: red;">عنوان موضوع مشخص نشده است.</h4>';
//            redirectPage(RELA_DIR . 'motivation/?action=add', $msg,1);
//            die();
//        }
        $_input['user_id'] = $_SESSION['user_id'];
        looeic::beginTransaction();
        $motivation = new motivationmodel();
        $motivation->setFields($_input);
        $result = $motivation->save();
        //print_r_debug($result);
        if ($result['result'] == -1 ) {
            $msg = 'عملیات با موفقیت انجام نشد';
            looeic::rollback() ;
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }
        $lastId = $result['export']['insert_id'] ;
        $phrasesAreasmodel = new motivational_phrases_areasmodel() ;
        $lifeAreaSelected = $_input['lifeArea'] ;
        if(count($lifeAreaSelected)>0) {
            foreach ($lifeAreaSelected as $k => $v) {
                $_input = array() ;
                $_input['id_motivational_phrases'] = $lastId ;
                $_input['id_life_areas'] = $v ;
                $phrasesAreasmodel->setFields($_input);
                $result = $phrasesAreasmodel->save();
                if ($result['result'] == -1 ) {
                    $msg = 'عملیات با موفقیت انجام نشد';
                    looeic::rollback() ;
                    redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
                    die();
                }
            }
        }
        looeic::commit() ;
        $msg = '<h4 style="text-align: center;color: #60ff35;">  عملیات با موفقیت انجام شد</h4>';
        redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
        die();

    }

    public function edit($id)
    {
        $motivation = motivationmodel::find($id);
        if ( !is_object($motivation) ) {
            $msg = 'عبارت یافت نشد';
            redirectPage(RELA_DIR . 'motivation/', $msg,1);
            die();
        }
        $export['list']['input']['id'] = $id ;
        $export['list']['input']['title'] = $motivation->title ;
        $export['list']['input']['phrase_fa'] = $motivation->phrase_fa ;
        $export['list']['input']['phrase_en'] = $motivation->phrase_en ;
        $export['list']['input']['author'] = $motivation->author ;
        $lifeArae = new motivational_phrases_areasmodel();
        $fields = array('where'=>'id_motivational_phrases = '.$motivation->id);
        $result_lifeArea = $lifeArae->getByFilter($fields);
        foreach($result_lifeArea['export']['list'] as $k=>$v){
            $export['list']['input']['lifeArea'][] = $v['id_life_areas'] ;
        }
        $export['list']['input']['action'] = 'edit' ;
        $lifeAreas = new life_areasmodel();
        $result = $lifeAreas::getAll();
        $result = $result->getList();
        if ($result['result'] == -1 ) {
            $msg = '<h4 style="text-align: center;color: red;">دریافت ناحیه های زندگی با خطا مواجه شد</h4>';
            redirectPage(RELA_DIR . 'topic/?action=add', $msg);
            die();
        }
        $lifeAreas = array() ;
        foreach($result['export']['list'] as $k=>$v){
            $lifeAreas[$v['id']] = $v['title'] ;
        }
        $export['list']['life_areas'] = $lifeAreas;
        //print_r_debug($export['list']['input']);
        $msg = '';
        $this->fileName = 'motivation.php';
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
    public function destroy($id)
    {
        //print_r_debug($_input);
        $error = array() ;
        if(!is_numeric($id)){
            $error[] = 'عبارت مشخص نیست' ;
        }
        looeic::beginTransaction();
        $phrasesArea = new motivational_phrases_areasmodel() ;
        $phrasesArea->where('id_motivational_phrases','=',$id);
        $result=$phrasesArea->getList();
        foreach($result['export']['list'] as $k=>$v){
            $resultPhrasesArea = $phrasesArea::find($v['id']);
            $result = $resultPhrasesArea->delete();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات با موفقیت انجام نشد';
                //looeic::rollback() ;
                redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
                die();
            }
        }
        $motivationObj = new motivationmodel() ;
        $motivationObj =  $motivationObj::find($id);
        $result = $motivationObj->delete();
        if ($result['result'] == -1 ) {
            $msg = 'عملیات با موفقیت انجام نشد';
            looeic::rollback() ;
            redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
            die();
        }
        looeic::commit();
        $msg = '<h4 style="text-align: center;color: #4bff35;">عملیات با موفقیت انجام شد</h4>';
        redirectPage(RELA_DIR . 'motivation/', $msg);
        die();
    }
    public function update($_input)
    {
        //print_r_debug($_input);
        $error = array() ;
        if(!isset($_input['id'])){
            $error[] = 'عبارت مشخص نیست' ;
        }
        if(count($error)>0) {
            $export['list']['input'] = $_input;
            $export['list']['input']['action'] = 'edit';
            $export['list']['ERR'] = 1;
            $export['list']['ERR-MSG'] = $error;
            $this->fileName = 'motivation.php';
            $this->template($export, '');
            die();
        }
        $id = $_input['id'];
        $title = $_input['title'];
        $phrase_fa = $_input['phrase_fa'];
        $phrase_en = $_input['phrase_en'];
        $author = $_input['author'];
        $lifeAreaSelected = $_input['lifeArea'] ;
        //print_r_debug($_input);
        looeic::beginTransaction();
        $phrasesArea = new motivational_phrases_areasmodel() ;
        $phrasesArea->where('id_motivational_phrases','=',$_input['id']);
        $result=$phrasesArea->getList();
        foreach($result['export']['list'] as $k=>$v){
            $resultPhrasesArea = $phrasesArea::find($v['id']);
            $result = $resultPhrasesArea->delete();
            if ($result['result'] == -1 ) {
                $msg = 'عملیات با موفقیت انجام نشد';
                looeic::rollback() ;
                redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
                die();
            }
        }
        if(count($lifeAreaSelected)>0) {
            foreach ($lifeAreaSelected as $k => $v) {
                $_input = array() ;
                $_input['id_motivational_phrases'] = $id ;
                $_input['id_life_areas'] = $v ;
                $phrasesArea->setFields($_input);
                $result = $phrasesArea->save();
                if ($result['result'] == -1 ) {
                    $msg = 'عملیات با موفقیت انجام نشد';
                    looeic::rollback() ;
                    redirectPage(RELA_DIR . 'motivation/?action=add', $msg);
                    die();
                }
            }
        }

        $motivationObj = motivationmodel::getBy_id($id)->first();
//        print_r_debug($motivationObj);
        $motivationObj->title = $title ;
        $motivationObj->phrase_fa = $phrase_fa ;
        $motivationObj->phrase_en = $phrase_en ;
        $motivationObj->author = $author ;
        $motivationObj->save();
        looeic::commit();
        $msg = '<h4 style="text-align: center;color: #4bff35;">عملیات با موفقیت انجام شد</h4>';
        redirectPage(RELA_DIR . 'motivation/', $msg);
        die();
    }

}
