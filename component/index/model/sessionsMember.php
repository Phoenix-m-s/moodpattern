<?php
include_once ROOT_DIR . 'common/chainquerybuilder.class.php';
include_once(ROOT_DIR . "common/looeic.php");

/**
 * Class sessions_member
 */
class sessionsMember extends looeic
{

    protected $TABLE_NAME = 'sessions_member';

    public function getHash()
    {
        return "dfdf46";
    }

    /**
     * @param $string
     * @param $key
     * @return string
     */
    function decrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);

        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

    /**
     * @param $string
     * @param $key
     * @return string
     */
    function encrypt($string, $key)
    {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }


    /**
     * @return int|mixed
     */
    public function checkLogin()
    {
        if (!isset($_SESSION["sessionMemberID"])) {
            if (!isset($_COOKIE["sessionMemberID"])) {
                return -1;
            } else {
                $sessionMemberID = $this->decrypt($_COOKIE["sessionMemberID"], $this->getHash());
            }
        } else {
            $sessionMemberID = $this->decrypt($_SESSION["sessionMemberID"], $this->getHash());
        }
        $sessionMember = sessionsMember::find($sessionMemberID);


        if (!is_object($sessionMember)) {
            return $sessionMember;
        }
     /*  $company = indexmodel::find($sessionMemberID);

        if (!is_object($company)) {
            return $company;
        }*/
        $member = indexmodel::find($_SESSION["mobile"]);

        $fields['mobile'] = $_SESSION["mobile"];
        $fields['user_id'] = $_SESSION["user_id"];
        $fields['sessionMemberID'] = $sessionMemberID;
        return $fields;
    }


    /**
     * @return mixed
     */

    public function logout()
    {
        if (isset($_SESSION["sessionMemberID"])) {

            $sessionMemberID = $this->decrypt($_SESSION["sessionMemberID"], $this->getHash());
            setcookie("sessionMemberID", $sessionMemberID, time() - 10000, "/", $_SERVER['HTTP_HOST']);

        } elseif (isset($_COOKIE["sessionMemberID"])) {

            $sessionMemberID = $this->decrypt($_COOKIE["sessionMemberID"], $this->getHash());
            setcookie("sessionMemberID", $sessionMemberID, time() - 10000, "/", $_SERVER['HTTP_HOST']);
        }

        unset($_SESSION['sessionMemberID']);
        unset($_SESSION['mobile']);
        session_unset();
        return;
    }

}

