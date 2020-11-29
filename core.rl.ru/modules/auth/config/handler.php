<?php
namespace Modules\Auth\Config;
use Modules\Auth\Config\Config as CFGauth;
class Handler
{
    
    public function auth($url)
    {
            $start = new \Modules\Auth\Controller\AuthShow;
            $start->  index($url);
    }
    public function register($url)
    {
        $start = new \Modules\Auth\Controller\RegShow;
            $start->  index($url);

        /*if(\CFG::$auth_type == "custom"){
            $result =  \Modules\Auth\Controller\Reg::custom($url);
        }elseif(\CFG::$auth_type == "api"){
            $result =  \Modules\Auth\Controller\Reg::api($url);
        }elseif(\CFG::$auth_type == "default"){
            $result =  \Modules\Auth\Controller\Reg::default($url);
            
        }else{
            $result = "error:failtypeReg";
        }
        return $result;*/
    }
    public function restore($url)
    {
       
    }
    public function exit($url)
    {
        $start = new \Modules\Auth\Controller\Exits;
        $start->  index($url);
   
       
    }
}