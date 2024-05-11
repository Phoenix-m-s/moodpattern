<?php

/*model*/
include_once ROOT_DIR . "component/index/model/indexmodel.php";
include_once ROOT_DIR . "component/index/model/sessionsMember.php";
include_once ROOT_DIR . "component/emailEngine/admin/Controllers/EmailEngineController.php";
//include_once ROOT_DIR . "common/clsEmail.php";

/*looeic*/
include_once ROOT_DIR . "common/looeic.php";

class indexController
{
    public $exportType = 'html';
    public $fileName;
    public $indexmodel;

    public function __construct()
    {
        $this->indexmodel = new indexmodel();
    }

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



    public function index()
    {
        if(isset($_SESSION['user_id'])){
            $msg = "";
            redirectPage(RELA_DIR . "topic/", $msg);
            die();
        }else {
            $this->fileName = "login.php";
            $this->template($this->fileName);
            die();
        }
    }

    /**
     * @param $fields
     */
    public function login($fields)
    {
//        if(convertToEnglish($fields['user_captcha']) != convertToEnglish($fields['captcha'])){
//            $msg = "<h4 style='text-align: center;color: red'/> کد امنیتی صحیح نمی باشد</h4>";
//            redirectPage(RELA_DIR . "index", $msg);
//            die();
//        }
        $result_user = indexmodel::getAll();
        $result_user->where('mobile','=',convertToEnglish($fields['mobile']));
        $result_user = $result_user->getList();
        if(!isset($result_user['export']['list'][0])){
            $msg = "<h4 style='text-align: center;color: red'/>لطفا ابتدا ثبت نام کنید.</h4>";
            redirectPage(RELA_DIR . "register/?action=add", $msg,1);
            die();
        }
        $user = indexmodel::getBy_mobile_and_password_and_status(convertToEnglish($fields['mobile']), md5($fields['password']), 1)->first();
        if (!is_object($user)) {
            $msg = "<h4 style='text-align: center;color: red'>نام کاربری یا رمز ورود اشتباه است</h4>";
            redirectPage(RELA_DIR . "index", $msg,1);
            die();
        }
        $member = $this->addSessionMember($user);
        if (!is_object($member)) {
            $msg = "<h4 style='text-align:center;color: red'>ورود با مشکل مواجه شد لطفا دوباره امتحان نمایید</h4>";
            redirectPage(RELA_DIR . "index", $msg);
        }

        $session_member = new sessionsMember();
        //$user->last_login = strftime('%Y-%m-%d %H:%M:%S', time());
        //$user->save();
        //$_SESSION['sessionMemberID'] = encrypt($member->Sessions_member_id, $session_member->getHash());
        $_SESSION['mobile'] =$user->mobile;
        $_SESSION['user_id'] =$user->id;
        $_SESSION['user_privileges'] =$user->user_privileges_id;
        $msg= "<h4 style='text-align: center;color: #f7f69c;'>خوش آمدید $user->fname</h4>";
        redirectPage(RELA_DIR . "topic/",$msg);


    }
    public function addSessionMember($user, $token = '')
    {
        $fields['remote_addr'] = $_SERVER['REMOTE_ADDR'];
        $fields['last_access_time'] = strftime('%Y-%m-%d %H:%M:%S', time());
        $fields['user_id'] = $user->id;
        $fields['remember_me'] = $token;
        //$fields['admin_id'] = 0;
        $sessionMember = new sessionsMember();
        $sessionMember->setFields($fields);
        $result = $sessionMember->save();
        $lastId = $result['export']['insert_id'] ;
        $_SESSION['sessionMemberID'] = encrypt($lastId, $sessionMember->getHash());
        if ($result['result'] == -1) {
            return $result;
        }
        return $sessionMember;
    }

    public function logout()
    {
        global $company_info;
        $sessionMember = new sessionsMember();
        if(isset($_SESSION["sessionMemberID"])) {
            $sessinId = $sessionMember->decrypt($_SESSION["sessionMemberID"], $sessionMember->getHash());
            $sessionObj = sessionsMember::getBy_Sessions_member_id($sessinId)->first();
            $sessionObj->logout_time = strftime('%Y-%m-%d %H:%M:%S', time());
            $sessionObj->save();
        }
        $sessionMember->logout();
        $msg= '<h4 style="color: #f77a16;text-align: center;">شما ازسیستم خارج شدید</h4>';
        redirectPage(RELA_DIR,$msg);
    }

    /**
     * @param array $fields
     * @param string $msg
     */
    public function getUsernameForm($fields = [], $msg = '')
    {
        $this->fileName = "login.getUsernameForm.php";
        $this->template($fields, $msg);
        die();
    }

    /**
     * @param $username
     */
    public function sendEmail($mobile)
    {
        $member = indexmodel::getBy_mobile(convertToEnglish($mobile))->first();
        //print_r_debug($member);
        if (!is_object($member)) {
            $msg['error'] = 1;
            $msg['msg'] = 'شماره موبایل وارد شده وجود ندارد';
            $fields['mobile'] = $mobile;
            $this->getUsernameForm($fields, $msg);
        }

        $token = uniqid();
        $sessionMember = $this->addSessionMember($member, $token);

        if (!is_object($sessionMember)) {
            $msg['error'] = 1;
            $msg['msg'] = 'ارسال ایمیل با مشکل مواجه شد لطفا دوباره امتحان نمایید';
            $this->getEmailForm($fields, $msg);
        }

        $path = ROOT_DIR . 'templates/' . CURRENT_SKIN . '/resetPassword.php';
        $link = RELA_DIR . 'index/getNewPassword/' . $token;

        $contacts = [
            'email' => $member->email,
            'subject' => 'لینک رمزعبور جدید',
            'body' => ['path' => $path, 'data' => compact('link')],
        ];

        if (EmailEngineController::forceSend($contacts)) {
            $msg['error'] = 0;
            $msg['msg'] = 'لینک فعالسازی به ایمیل شما ارسال شد';
            $this->getUsernameForm($fields = '', $msg);
        } else {
            $msg['error'] = 1;
            $msg['msg'] = 'ایمیل ارسال نشد، لطفا مجددا تلاش فرمایید';
            $this->getUsernameForm($fields = '', $msg);
        }
    }

    /**
     * @param $email
     * @param $code
     * @return mixed
     * @internal param $token
     */
//    public function mail($email, $code)
//    {
//        $mail = new clsEmail();
//        $inputList['code'] = $code;
//        $inputList['link'] = 'getNewPassword/' . $code;
//        $inputList['title'] = 'لینک رمزعبور جدید';
//        $inputList['footer'] = RELA_DIR;
//        $mail->variable = $inputList;
//        $body = $mail->parse(ROOT_DIR . 'templates/' . CURRENT_SKIN . "/compareCompanyEmailTemplate.php");
//        $r = newSendMails($email, 'لینک رمزعبور جدید', $body);
//        return $r;
//    }

    /**
     * @param $token
     */
    public function getNewPasswordForm($token)
    {
        $session_member = sessionsMember::getBy_remember_me($token)->first();
        if (!is_object($session_member)) {
            redirectPage(RELA_DIR . '404');
        }

        $fields['user_id'] = $session_member->user_id;
        $fields['token'] = $token;
        $this->showNewPasswordForm($fields);
    }


    public function showNewPasswordForm($fields)
    {
        $this->fileName = "login.newPasswordForm.php";
        $this->template($fields);
        die();
    }

    /**
     * @param $fields
     */
    public function savePassword($fields)
    {
        if (trim($fields['password']) == '' || trim($fields['re_password']) == '') {
            $fields['msg'] = "فیلد رمز عبور و یا تکرار آن خالی می باشد";
            $this->showNewPasswordForm($fields);
        }
        if ($fields['password'] != $fields['re_password']) {
            $fields['msg'] = "فیلد رمز عبور با تکرار رمز عبور برابر نیست";
            $this->showNewPasswordForm($fields);
        }
        $session_member = sessionsMember::getBy_user_id_and_remember_me($fields['user_id'], $fields['token'])->first();

        if (!is_object($session_member)) {
            $msg = "<h4 style='text-align: center;color:red;'>صفحه مورد نظر یافت نشد</h4>";
            redirectPage(RELA_DIR . '404', $msg);
        }
        $member = indexmodel::getBy_id($fields['user_id'])->first();
        if (is_object($member)) {
            $member->password = md5($fields['password']);
            $result = $member->save();
        }

        if ($result['result'] == 1) {
            $session_member->delete();
        }

        $msg = "<h4 style='text-align: center;color: #f7f69c;'>
        رمز عبور با موفقیت تغییر یافت
        </h4>";
        redirectPage(RELA_DIR . 'index', $msg,1);
    }
    public function deleteAllMemberByCompanyId($user_id)
    {
        //print_r_debug($user_id);
        //delete from main table
       /* $members = members::getAll()
            ->where('user_id', '=', $user_id)
            ->get();

        if ($members['export']['recordsCount'] > 0) {
            foreach ($members['export']['list'] as $member) {
                $member->delete();
            }
        }

        return;*/

    }


}
