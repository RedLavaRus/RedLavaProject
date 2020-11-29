<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Modules\Auth\Config\Config as CFGauth;

class Auth
{
    
    public static function default($url)
    {
        return self::checkDate($url);
    }
    public static function api($url)
    {
        
        $urlC = \Modules\Auth\Config\Config::$authAPIDomen."/?go=api&func=auth&login=".$url["get"]["login"]."&pass=".$url["get"]["pass"];

        $ch = curl_init($urlC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);
         
        var_dump( $html);
        
    }
    public static function custom($url)
    {
       
    }

    public static function checkDate($url)
    {
        if(strlen($url["post"]["login"]) < \CFG::$minimum_login){
            \Core\User\CollectorError::$error_login .="логин слишком короткий";
            return "error:логин слишком короткий";
        }
        if(strlen($url["post"]["login"]) > \CFG::$maximum_login){
            \Core\User\CollectorError::$error_login .="логин слишком длинный";
            return "error:логин слишком длинный";}
        if(strlen($url["post"]["pass1"]) < \CFG::$minimum_password){
            \Core\User\CollectorError::$error_pass .="пароль слишком короткий";
            return "error:пароль слишком короткий";}
        if(strlen($url["post"]["pass1"]) > \CFG::$maximum_password){
            \Core\User\CollectorError::$error_pass .= "пароль слишком длинный";
            return "error:пароль слишком длинный";}
        return self::cash($url);
        //проверить заполнены ли поля
    }
    public static  function cash($url){
        //закегировать пароль 
        $url["securit"]["pass"] = \Libs\GuardPassHash\HasherRL::startHash($url);        
        return self::auth($url);
    }
    public static  function auth($url){
        //Проверить совпадение логина и паролья и возврат id-------
        $login = $url["post"]["login"];
        $pass = $url["securit"]["pass"];

        $orm = new Orm;
        $id = $orm->select("id")
        ->where("
        login = $login, 
        pass =  $pass 
        "
          )->from("User")->execute()->object();
          
          if(isset($id->object[0]["id"]) and $id->object[0]["id"] >= 1) 
          {return "ok:".$id->object[0]["id"];}
          else 
          {
            \Core\User\CollectorError::$error_login .="неверный логин и пароль";
            \Core\User\CollectorError::$error_pass .="неверный логин и пароль";
              return "error:неверный логин и пароль";
            }      
        
    }
}