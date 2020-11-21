<?php
namespace Modules\Auth\Controller;
use Modules\Auth\Config\Config as CFGauth;
class Auth
{
    
    public static function default($url)
    {
        if(!(self::checkDate($url))){return "error:Ошибка";}
        return self::auth($url);
    }
    public static function api($url)
    {
       
    }
    public static function custom($url)
    {
       
    }

    public static function checkDate($url)
    {
        return false ;
    }
    public static  function auth($url){
        return "aa";
    }
}