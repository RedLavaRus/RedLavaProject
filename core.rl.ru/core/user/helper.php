<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;
use \CFG as CFG;

class Helper
{
    public function returnUserId($login){

        $orm = new Orm;
        $orm->select("id")
        ->where("login = $login")
        ->from("user")->limit(1)->execute()->object();

        return $orm->object[0]["id"];
    }

    public function returnUserLogin($id){

        $orm = new Orm;
        $orm->select("login")
        ->where("id = $id")
        ->from("user")->limit(1)->execute()->object();

        return $orm->object[0]["login"];
    }
}