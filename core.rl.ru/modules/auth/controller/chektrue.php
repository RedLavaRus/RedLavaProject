<?php
namespace Modules\Auth\Controller;



class ChekTrue
{
    public static function ChekTrueR($url){
        //var_dump($url);
        if(!\Libs\UserCheak\Cheak::issetLogin($url)){return false;}
        if(!\Libs\UserCheak\Cheak::passwordОpen($url)){return false;}
        return true;
    }
    
}