<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Modules\Auth\Config\Config as CFGauth;

class AuthShow
{
    public function index($url){
        if(\CFG::$auth_type == "custom"){
 //           
 //           $result =  \Modules\Auth\Controller\Auth::custom($url);
 //           \Modules\Auth\Controller\ChekTrue::ChekTrueR($url);

        }elseif(\CFG::$auth_type == "api"){
  //          $result =  \Modules\Auth\Controller\Auth::api($url);
            $this->showForm($url);
        }elseif(\CFG::$auth_type == "default"){
            $this->showForm($url);
        }else{
            
        }
        

       

        
        //var_dump($result);
    }
    public function showForm($url){
        if(ISSET($_SESSION["id"]) AND $_SESSION["id"] >= 1){\Core\Values\Val::addHead('<meta http-equiv="refresh" content="0;URL=/" />');}
        if(empty($url["post"]["get_rec"])){
            $temp = new \Core\Template\Temp;
            $temp -> View("defaults","/user/login");
        }else{
            \Modules\Auth\Controller\ChekTrue::ChekTrueR($url);
            $result =  \Modules\Auth\Controller\Auth::default($url);
            
            $ids = explode(":", $result);
            if(isset($ids["1"]) and $ids["1"] >=1)
            {
                $_SESSION["id"] = $ids["1"];
                \Core\Values\Val::addHead('<meta http-equiv="refresh" content="0;URL=/" />');
                
            }
            
            $temp = new \Core\Template\Temp;
            $temp -> View("defaults","/user/login");

        }
        
    }
    
}