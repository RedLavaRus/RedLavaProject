<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Modules\Auth\Config\Config as CFGauth;

class RegShow
{
    public function index($url){
        if(\CFG::$auth_type == "custom"){
 //           
 //           $result =  \Modules\Auth\Controller\Auth::custom($url);
 //           \Modules\Auth\Controller\ChekTrue::ChekTrueR($url);

        }elseif(\CFG::$auth_type == "api"){
  //          $result =  \Modules\Auth\Controller\Auth::api($url);
        }elseif(\CFG::$auth_type == "default"){
            $this->showForm($url);
        }else{
            
        }
    }
    public function showForm($url){
            if(ISSET($_SESSION["id"]) AND $_SESSION["id"] >= 1){\Core\Values\Val::addHead('<meta http-equiv="refresh" content="0;URL=/" />');}
            if(empty($url["post"]["get_rec"])){
                $temp = new \Core\Template\Temp;
                $temp -> View("defaults","/user/register");
            }else{
                \Modules\Auth\Controller\ChekTrue::ChekTrueR($url);
                $result =  \Modules\Auth\Controller\Reg::default($url);
                
                $ids = explode(":", $result);
                if(isset($ids["1"]) and isset($ids["0"]) and $ids["1"] >=1 and $ids["0"] == "ok")
                {
                    $_SESSION["id"] = $ids["1"];
                    \Core\Values\Val::addHead('<meta http-equiv="refresh" content="0;URL=/" />');
                    
                }
                
                $temp = new \Core\Template\Temp;
                $temp -> View("defaults","/user/register");
    
            }
            
    }

}