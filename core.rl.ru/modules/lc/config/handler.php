<?php
namespace Modules\Lc\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Handler
{
    public static $lmenu;
    public static $tmemu;

    public function install(){

        $dd = new Create();
        $dd -> create("lc_lmenu")
        ->add("group","VARCHAR","255","not null","Функия вызова")
        ->add("url","VARCHAR","255","not null","Урл страницы")
        ->add("name","VARCHAR","255","not null","Класс страницы")
        ->add("class","VARCHAR","255","not null","Функия вызова")
        ->add("permission","text","","","право доступа");
        $dd ->execute();

        $zz = new Create();
        $zz -> create("lc_tmenu")
        ->add("group","VARCHAR","255","not null","Функия вызова")
        ->add("url","VARCHAR","255","not null","Урл страницы")
        ->add("name","VARCHAR","255","not null","Класс страницы")
        ->add("class","VARCHAR","255","not null","Функия вызова")
        ->add("permission","text","","","право доступа");
        $zz ->execute();

        $orm = new Orm;
        $orm->insert("
        group = default,
        url =  /lc/,
        name = Личный кабинет,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();



        $orm2 = new Orm;
        $orm2->insert("
        url = lc,
        class = Modules\Lc\Config\Handler,
        func = startShow,
        Описание = Главная страница Личного кабинета
    ")            
    ->from("router")->execute();
    
    }
    public function startShow($url){
        $this->showLeftMenu($url);
        $this->showTopMenu($url);
        $this->showContent($url);
        $this->bild($url);
    }

    public function showLeftMenu($url){

        $orm = new Orm;
        $db_tb = $orm->select("id,group,url,name,class,permission")
        ->from("lc_lmenu")->execute()->object();
        
        $x=0;
        foreach($db_tb->object as $item){
            $leftMenuArray[$x]["id"] = $item["id"];
            $leftMenuArray[$x]["url"] = $item["url"];
            $leftMenuArray[$x]["name"] = $item["name"];
            $leftMenuArray[$x]["class"] = $item["class"];
            $leftMenuArray[$x]["group"] = $item["group"];
            $x++;
        }

        //var_dump("<pre>",$leftMenuArray);
        self::$lmenu = $leftMenuArray;

    }

    public function showTopMenu($url){

        $leftMenuArray["id1"]["id"] = "1";
        $leftMenuArray["id1"]["url"] = "/lc/index/";
        $leftMenuArray["id1"]["name"] = "Личный кабинет";
        $leftMenuArray["id1"]["class"]  = "on";
        self::$tmemu = $leftMenuArray;

    }


    public function showContent($url){

    }


    public function bild($url){

        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","lc","tmenu");
        $view->ViewCastom("defaults","lc","index");
        $view->ViewCastom("defaults","lc","lmenu");

    }
}