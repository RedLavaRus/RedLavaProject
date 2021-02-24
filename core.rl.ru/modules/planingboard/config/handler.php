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

        $dd2 = new \Core\Orm\Create;
        $dd2 -> create("broad_graf")
        ->add("idagent","INT","11","not null","ИД АГЕНТА")
        ->add("vih_pn","VARCHAR","11","not null","Понедельник")
        ->add("vih_vt","VARCHAR","11","not null","Вторник")
        ->add("vih_sr","VARCHAR","11","not null","Среда")
        ->add("vih_ch","VARCHAR","11","not null","Четверг")
        ->add("vih_pt","VARCHAR","11","not null","Пятница")
        ->add("vih_cb","VARCHAR","11","not null","Суббота")
        ->add("vih_vs","VARCHAR","11","not null","Воскресение")
        ->add("type_pn","VARCHAR","11","not null","Понедельник")
        ->add("type_vt","VARCHAR","11","not null","Вторник")
        ->add("type_sr","VARCHAR","11","not null","Среда")
        ->add("type_ch","VARCHAR","11","not null","Четверг")
        ->add("type_pt","VARCHAR","11","not null","Пятница")
        ->add("type_cb","VARCHAR","11","not null","Суббота")
        ->add("type_vs","VARCHAR","11","not null","Воскресение");
        $dd2 ->execute();

                
        $dd3 = new \Core\Orm\Create;
        $dd3 -> create("broad_znanie")
        ->add("idagent","INT","11","not null","ИД АГЕНТА")
        ->add("name1","VARCHAR","255","not null","Название обучения")
        ->add("stat1","VARCHAR","255","not null","Статус обучения")
        ->add("name2","VARCHAR","255","not null","Название обучения")
        ->add("stat2","VARCHAR","255","not null","Статус обучения")
        ->add("name3","VARCHAR","255","not null","Название обучения")
        ->add("stat3","VARCHAR","255","not null","Статус обучения")
        ->add("name4","VARCHAR","255","not null","Название обучения")
        ->add("stat4","VARCHAR","255","not null","Статус обучения")
        ->add("name5","VARCHAR","255","not null","Название обучения")
        ->add("stat5","VARCHAR","255","not null","Статус обучения");
        $dd3 ->execute();

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

    public function import($url)
    {
        \Core\Values\Val::$helper["url"] =$url;
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","planingboard","lmenu");
        $view->ViewCastom("defaults","planingboard","import");
    }

}