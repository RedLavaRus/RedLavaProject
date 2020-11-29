<?php
namespace Modules\Auth\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Modules\Auth\Config\Config as CFGauth;

class Exits
{
    
    public static function index($url)
    {
        unset($_SESSION["id"]);
        \Core\Values\Val::addHead('<meta http-equiv="refresh" content="0;URL=/" />');

        $temp = new \Core\Template\Temp;
        $temp -> View("defaults","/user/register");
        return;
    }
}