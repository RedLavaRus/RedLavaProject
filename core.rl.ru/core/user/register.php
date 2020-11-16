<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Template\Temp as Temp;

class Register
{

    public function startRegister($url){
        $cheker = new \Core\User\Cheaker;
        $cheker->chekAuth($url);
        $cheker->chekRegData($url);

        if(\Core\User\CollectorError::$all_errors != null)
        {
            $this->resultReturn($url);
        }else{
            //suspend!
            $this->getReg($url);
            $this->resultReturn($url);
        }
    }



    public function getReg($url){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];
 
        if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
        elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
        else $ip = $remote;

        $ip_reg = $ip;
        $date_reg = time();

        $orm = new Orm;
        $orm->insert("
        login = ".$url["post"]["login"].",
        pass = ".$url["post"]["pass1"].",
        email = ".$url["post"]["email"].",
        ip_reg =".$ip_reg.",
        date_reg = ".$date_reg."
    ")            
    ->from("user")->execute();

        
    }

    public function resultReturn($url){ 
        $temp = new \Core\Template\Temp;
        $temp -> View("defaults","/user/register");
        
    }
}