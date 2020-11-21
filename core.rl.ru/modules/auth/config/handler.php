<?php<?php
namespace Modules\Auth\Config;
use Modules\Auth\Config\Config as CFGauth;
class Handler
{
    
    public function auth($url)
    {
        if(CGF::$auth_type == "custom"){
            Modules\Auth\Controller\Auth::custom($url);
        }elseif(CGF::$auth_type == "api"){
            Modules\Auth\Controller\Auth::api($url);
        }elseif(CGF::$auth_type == "default"){
            Modules\Auth\Controller\Auth::default($url);
        }else{

        }
    }
    public function register($url)
    {
       
    }
    public function restore($url)
    {
       
    }
    public function exit($url)
    {
       
    }
}