<?php
namespace Modules\Auth\Config;
use Modules\Auth\Config\Config as CFGauth;
class Handler
{
    
    public function auth($url)
    {
        if(\CFG::$auth_type == "custom"){
            
            $result =  \Modules\Auth\Controller\Auth::custom($url);
            \Modules\Auth\Controller\ChekTrue::ChekTrueR($url);

        }elseif(\CFG::$auth_type == "api"){
            $result =  \Modules\Auth\Controller\Auth::api($url);
        }elseif(\CFG::$auth_type == "default"){
            $result =  \Modules\Auth\Controller\Auth::default($url);
        }else{
            $result = "error:failtypeAuth";
        }
        return $result;
    }
    public function register($url)
    {
        if(\CFG::$auth_type == "custom"){
            $result =  \Modules\Auth\Controller\Reg::custom($url);
        }elseif(\CFG::$auth_type == "api"){
            $result =  \Modules\Auth\Controller\Reg::api($url);
        }elseif(\CFG::$auth_type == "default"){
            $result =  \Modules\Auth\Controller\Reg::default($url);
            
        }else{
            $result = "error:failtypeReg";
        }
        return $result;
    }
    public function restore($url)
    {
       
    }
    public function exit($url)
    {
       
    }
}