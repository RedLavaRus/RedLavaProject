<?php
namespace Modules\PlaningBoard\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Handler
{
    public function install(){
        $dd = new Create();
        $dd -> create("broad_static")
        ->add("zd_shpd","INT","11","not null","ЗАЯВОК НА ШПД")
        ->add("zd_tv","INT","11","not null","ЗАЯВОК НА ТВ")
        ->add("con_shpd","INT","11","not null","ПОДКЛЮЧЕНО ШПД")
        ->add("con_tv","INT","11","not null","ПОДКЛЮЧЕНО ТВ");
        $dd ->execute();
    }
    
    public function zayavki($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","zayavki");
    }
    
    public function connect($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","connect");
    }
    
    public function grafic($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","grafic");
    }
    
    public function znanie($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","znanie");
    }
    
    public function vizov($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","vizov");
    }

}