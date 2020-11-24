<?php
namespace Modules\Auth\Controller;
use Modules\Auth\Config\Config as CFGauth;
class Auth
{
    
    public static function default($url)
    {
        return self::api($url);
    }
    public static function api($url)
    {
       return self::checkDate($url);
       
        
    }
    public static function custom($url)
    {
       
    }

    public static function checkDate($url)
    {
        if($url["post"]["login"] < \CFG::$minimum_login){return "error:логин слишком короткий";}
        if($url["post"]["login"] > \CFG::$maximum_login){return "error:логин слишком длинный";}
        if($url["post"]["login"] < \CFG::$minimum_password){return "error:пароль слишком короткий";}
        if($url["post"]["login"] > \CFG::$maximum_password){return "error:пароль слишком длинный";}
        return self::cash($url);
        //проверить заполнены ли поля
    }
    public static  function cash($url){
        //закегировать пароль 
        $url["securit"]["pass"] = \Libs\GuardPassHash\HasherRL::startHash($url);        
        return self::auth($url);
    }
    public static  function auth($url){
        //Проверить совпадение логина и паролья и возврат id
        
    }
}