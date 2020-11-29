<?php
namespace Modules\AuthAPI\Config;
use Modules\Auth\Config\Config as CFGauth;
class Handler
{
    
    public function auth($url)
    {

        $url["post"]["login"] = $url["get"]["login"];
        $url["post"]["pass1"] = $url["get"]["pass"];
        $result =  \Modules\Auth\Controller\Auth::default($url);
        echo $result;
    }
    public function register($url)
    {
        $url["post"]["login"] = $url["get"]["login"];
        $url["post"]["pass1"] = $url["get"]["pass"];
        $url["post"]["email"] = $url["get"]["email"];
        $result =  \Modules\Auth\Controller\Reg::default($url);
        echo $result;
    }
    public function restore($url)
    {
       
    }
    public function exit($url)
    {
       
    }
}