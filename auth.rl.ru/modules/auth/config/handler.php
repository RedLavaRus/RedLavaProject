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