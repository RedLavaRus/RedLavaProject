<?php
namespace Modules\PlaningBoard\Config;

class Handler
{
    
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