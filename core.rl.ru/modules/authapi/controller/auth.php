<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
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
        if(strlen($url["post"]["login"]) < \CFG::$minimum_login){return "error:логин слишком короткий";}
        if(strlen($url["post"]["login"]) > \CFG::$maximum_login){return "error:логин слишком длинный";}
        if(strlen($url["post"]["pass"]) < \CFG::$minimum_password){return "error:пароль слишком короткий";}
        if(strlen($url["post"]["pass"]) > \CFG::$maximum_password){return "error:пароль слишком длинный";}
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
          {return "error:неверный логин и пароль";}      
        
    }
}