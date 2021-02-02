<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Modules\Auth\Config\Config as CFGauth;

class Reg
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

    public static function cash($url)
    {
        $url["securit"]["pass"] = \Libs\GuardPassHash\HasherRL::startHash($url);        
        return self::testLogin($url);

    }

    public static function testLogin($url)
    {
        
        $login = $url["post"]["login"];
        $orm = new Orm;
        $id = $orm->select("id")
        ->where("
        login = $login
        "
          )->from("user")->execute()->object();
          //var_dump("<pre>",$id);
          
          if(isset($id->object[0]["id"]) and $id->object[0]["id"] >= 1) 
          {return "error:Логин занят";}
          else 
          {
           return self::addUser($url);
          }  
    }
    public static function addUser($url){
        $login = $url["post"]["login"];
        $pass =$url["securit"]["pass"];
        $email =$url["post"]["email"];
        $ip_reg =$_SERVER['REMOTE_ADDR'];
        $date_reg = time();

        $orm = new Orm;
        $orm->insert("
        login = $login ,
        pass = $pass,
        email = $email,
        ip_reg =$ip_reg,
        date_reg =$date_reg 
    ")            
    ->from("user")->execute();

    return self::iduser($url);
    }

    public static function iduser($url){
        $login = $url["post"]["login"];
        $pass = $url["securit"]["pass"];

        $orm = new Orm;
        $id = $orm->select("id")
        ->where("
        login = $login, 
        pass =  $pass 
        "
          )->from("user")->execute()->object();
          $ids = $id->object[0]["id"];
          if($ids >= 1) 
          {return "ok:$ids";}
          else 
          {return "error:ошибка!";}     

    }

}