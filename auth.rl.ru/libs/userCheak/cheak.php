<?php
namespace Libs\UserCheak;

class Cheak
{
    public static function issetLogin($url)
    {
        if(strlen($url["post"]["login"]) < \CFG::$minimum_login){\Core\User\CollectorError::$error_login .= "error:логин слишком короткий";}
        if(strlen($url["post"]["login"]) > \CFG::$maximum_login){\Core\User\CollectorError::$error_login .= "error:логин слишком длинный";}
        if(\Core\User\CollectorError::$error_login != ""){
            return true;
        }else{
            return false;
        }
    }
    public static function passwordОpen($url)
    {
        if(strlen($url["post"]["pass1"]) < \CFG::$minimum_password){\Core\User\CollectorError::$error_pass .= "error:пароль слишком короткий";}
        if(strlen($url["post"]["pass1"]) > \CFG::$maximum_password){\Core\User\CollectorError::$error_pass .= "error:пароль слишком длинный";}
        if(\Core\User\CollectorError::$error_pass != ""){
            return true;
        }else{
            return false;
        }
    }

}



?>