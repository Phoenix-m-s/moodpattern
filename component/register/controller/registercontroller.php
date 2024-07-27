<?php

/*model*/
include_once ROOT_DIR . "component/register/model/registermodel.php";
include_once ROOT_DIR . "component/register/model/provincemodel.php";
include_once ROOT_DIR . "component/register/model/countrymodel.php";
include_once ROOT_DIR . "component/index/model/indexmodel.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

/**
 * Class registercontroller
 */
class registercontroller
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
     * @var registermodel
     */
    public $registermodel;

    /**
     * registercontroller constructor.
     */
    public function __construct()
    {
        $this->registermodel = new registermodel();
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
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/logintitle.php");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/$this->fileName");
                include(ROOT_DIR . "templates/" . CURRENT_SKIN . "/logintail.php");
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
        $this->fileName = "register?action=add";
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
        $province = new provincemodel();
        $fields = array('order' => array('title' => 'ASC'));
        $result_province = $province->getByFilter($fields);
        $country = new countrymodel();
        $fields = array('order' => array('title' => 'ASC'));
        $result_country = $country->getByFilter($fields);
        $export['list']['province'] = $result_province ;
        $export['list']['country'] = $result_country ;
        $this->fileName = 'register.php';
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
        $error = array() ;
        if (!empty($_input['email']) && !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_input['email'])) {
            $error[] = 'پست الکترونیک صحیح نمی باشد.' ;
        }else{
            $_input['email'] = strtolower($_input['email']) ;
        }
        if(empty($_input['mobile'])){
            $error[] = 'شماره موبایل خالی می باشد.';
        }elseif($_input['country_id'] == 103 && !preg_match("/^09[0-9]{9}$/", convertToEnglish($_input['mobile']))) {
            $error[] = 'شماره موبایل صحیح نمی باشد.' ;
        }else{
            $_input['mobile'] = convertToEnglish($_input['mobile']) ;
            $user = new indexmodel() ;
            $result_user = $user::getAll();
            $result_user->where('mobile','=',$_input['mobile']);
            $result_user = $result_user->getList();
            //print_r_debug($result_user);
            if(isset($result_user['export']['list'][0])){
                $error[] = 'شماره موبایل تکراری می باشد.' ;
            }
        }
        if(empty($_input['lname'])){
            $error[] = 'نام خانوادگی خالی می باشد.';
        }
        if(empty($_input['password'])){
            $error[] = 'رمز عبور خالی می باشد.';
        }elseif ($_input['password'] != $_input['confirm_password']) {
            $error[] = 'کلمه عبور با تکرار آن برابر نمی باشد.' ;
        }
        if(empty($_input['age'])){
            $error[] = 'سن خالی می باشد.';
        }
        if(empty($_input['is_student'])){
            $error[] = 'دانشجوی کلام زنده هستم/نیستم، خالی است.';
        }
        if(empty($_input['country_id'])){
            $error[] = 'کشور محل سکونت انتخاب نشده است.';
        }
        if($_input['country_id'] == 103 && (empty($_input['province_id']) || $_input['province_id']==0)){
            $error[] = 'استان محل سکونت انتخاب نشده است.';
        }
        if(!isset($_input['education_section'])){
            $error[] = 'مقطع تحصیلی انتخاب نشده است.';
        }
        if(!isset($_input['gender_status']) ){
            $error[] = 'جنسیت انتخاب نشده است.';
        }elseif($_input['gender_status'] <> 0 && $_input['gender_status']<>1){
            $error[] = 'جنسیت نادرست است.' ;
        }
        if(!isset($_input['married_status']) ){
            $error[] = 'وضعیت تاهل انتخاب نشده است.';
        }elseif($_input['married_status'] <> 0 && $_input['married_status']<>1){
            $error[] = 'وضعیت نادرست است.' ;
        }
        if(count($error)>0) {
                $export['list']['input'] = $_input;
                $province = new provincemodel();
                $fields = array('order' => array('title' => 'ASC'));
                $result_province = $province->getByFilter($fields);
                $country = new countrymodel();
                $fields = array('order' => array('title' => 'ASC'));
                $result_country = $country->getByFilter($fields);
                $export['list']['province'] = $result_province;
                $export['list']['country'] = $result_country;
                $export['list']['ERR'] = 1;
                $export['list']['ERR-MSG'] = $error;
                $this->fileName = 'register.php';
                $this->template($export, '');
                die();
            }

        $_input['password'] = md5($_input['password']);
        $register = new registermodel();
        $register->setFields($_input);
        $result = $register->save();
        if ($result['result'] == -1 ) {
            $msg = '<h4 style="text-align: center;color: red;">  عملیات با موفقیت انجام نشد</h4>';
            redirectPage(RELA_DIR . 'register/?action=add', $msg);
            die();
        }
        $msg = '<h4 style="text-align: center;color: #4bff35;">  عملیات با موفقیت انجام شد</h4>';
        redirectPage(RELA_DIR, $msg);
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
        $register = registermodel::find($id);
        if ( !is_object($register) ) {
            $msg = 'صفحه مورد نظر یافت نشد';
            redirectPage(RELA_DIR . 'register/', $msg);
            die();
        }
        $export = $register->fields;
        echo '<pre>';
        print_r($export);
        //$msg = 'صفحه مورد نظر یافت شد';
        //$this->fileName = '';
        //$this->template($export, $msg);
        //redirectPage(RELA_DIR . 'register/', $msg);
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
        $register = registermodel::find($id);
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
        $register = registermodel::find($_input['id']);
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
        $register = registermodel::find(2);
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
        $register = new registermodel();
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
