<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;
use \CFG as CFG;

class Cheaker
{
    public function chekAuth($url){
        if (isset($_SESSION["id"]) and $_SESSION["id"] >= 1)
        {
            \Core\User\CollectorError::addError("Вы уже авторизованы!");
            return "error";
        }
    }

    public function chekRegData($url){
        $this->chekLogin($url);
        $this->chekPass($url);

        $this->chekEmail($url);
        $this->chekCaptcha($url);
    }

    public function chekLogin($url){
        $this->chekLongLogin($url);       
        $this->chekFreeLogin($url);
    }

    public function chekPass($url){
        $this->overlapPass($url);
        $this->chekLongPass($url);
    }

    public function chekEmail($url){
        if (!filter_var($url["post"]["email"], FILTER_VALIDATE_EMAIL)) {            
            \Core\User\CollectorError::addError("Не верный емаил", "email");
        }
    }

    public function chekCaptcha($url){
    }

    public function chekLongLogin($url){
        if(strlen($url["post"]["login"]) > CFG::$maximum_login){
            \Core\User\CollectorError::addError("Логин длинный", "login");
        }

        if(strlen($url["post"]["login"]) <= CFG::$minimum_login){
            \Core\User\CollectorError::addError("Логин короткий", "login");
        }
    }

    public function chekFreeLogin($url){
        $login = $url["post"]["login"];

        $orm = new Orm;
        $orm->select("id")
        ->where("login = $login")
        ->from("user")->limit(1)->execute()->object();


        if(isset($orm->object[0]["id"])){
            \Core\User\CollectorError::addError("Логин занят", "login");
        }
    }

    public function overlapPass($url){
        if($url["post"]["pass1"] != $url["post"]["pass2"]){
            \Core\User\CollectorError::addError("Пароли не совпадают", "pass"); 
            \Core\User\CollectorError::addError("Пароли не совпадают", "pass2");   
        }    
    }

    public function chekLongPass($url){
        if(strlen($url["post"]["pass1"]) > CFG::$maximum_password){
            \Core\User\CollectorError::addError("Пароль длинный", "pass");
        }

        if(strlen($url["post"]["pass1"]) <= CFG::$minimum_password){
            \Core\User\CollectorError::addError("Пароль короткий", "pass");
        }
    }
}