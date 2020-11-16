<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;

class CollectorError
{
    public static $all_errors;

    public static $error_login = NULL;
    public static $error_pass = NULL;
    public static $error_pass2 = NULL;
    public static $error_email = NULL;
    public static $error_captcha = NULL;

    public static function addError($error,$type = null){

        if($type == "login"){
            self::$error_login .= $error;
            self::$all_errors .= $error;  

        }elseif($type == "pass"){
            self::$error_pass .= $error;
            self::$all_errors .= $error;  

        }elseif($type == "pass2"){
            self::$error_pass2 .= $error;   
            self::$all_errors .= $error;   

        }elseif($type == "email"){
            self::$error_email .= $error;   
            self::$all_errors .= $error;     

        }elseif($type == "captcha"){
            self::$error_captcha .= $error;   
            self::$all_errors .= $error;   

        }else{
            self::$all_errors .= $error;  
        }

    }
}