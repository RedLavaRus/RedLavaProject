<?php
namespace Modules\Index\Config;

class Handler
{
    
    public function index()
    {
        /**
         * connect head
         * nav
         * header
         * body
         * footer
         */

        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","index","headonepage");
        $view->ViewCastom("defaults","index","onepage");



         die();
        $result = new \Core\Show\View;
        \Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/app.css">',"pre");
        \Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/default.css">',"pre");
        
                echo
                \Core\Values\Val::returnHead("pre").
                \Core\Values\Val::returnHead(NULL).
                \Core\Values\Val::returnHead("post");
                echo 1;
        $class = new \Modules\Index\Controller\Index;
        $class->index();

    }
}