<?php<?php
namespace Modules\Auth\Config;
use Modules\Auth\Config\Config as CFGauth;
class Handler
{
    
    public function auth($url)
    {
        if(CGF::$auth_type == "custom"){

        }elseif(CGF::$auth_type == "api"){

        }elseif(CGF::$auth_type == "default"){

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