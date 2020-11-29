<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;

class Handler
{
    public function indexAuth($url){
        if(isset($url["post"]["get_rec"]) and $url["post"]["get_rec"] > "")
        {
            $reg = new \Core\User\Login;
            $reg -> startLogin($url);
        }else{
            $temp = new \Core\Template\Temp;
            $temp -> View("defaults","/user/login");
        }
    }

    public function indexRegister($url){
        if(isset($url["post"]["get_rec"]) and $url["post"]["get_rec"] > "")
        {
            $reg = new \Core\User\Register;
            $reg -> startRegister($url);
        }else{
            $temp = new \Core\Template\Temp;
            $temp -> View("defaults","/user/register");
        }
        
    }

    public function indexExit($url){
        $temp = new \Core\Template\Temp;
        $temp -> View("defaults","/user/exit");
    }


    public function ajaxAuth($url){

    }
    public function ajaxRegister($url){

    }
    public function ajaxExit($url){

    }
}