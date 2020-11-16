<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;

class Login
{

    public function startLogin($url){
        $cheker = new \Core\User\Cheaker;
        $cheker->chekAuth($url);
        $this->getLogin($url);
    }

    public function getLogin($url){
    }



    
}