<?php

namespace Modules\CRMPhone\Controller;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Thinks
{
    public static $lmenu;
    public static $tmemu;
    public static $clientinfo;

    public function install(){
        $orm = new Orm;
        $orm->insert("
        group = default,
        url =  /lc/thinks/,
        name = Потанцеальные клиенты,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();

        $orm3 = new Orm;
        $orm3->insert("
        url = lc/thinks,
        class = Modules\CRMPhone\Controller\Thinks,
        func = start,
        Описание = Потанцеальные клиенты
        ")            
        ->from("router")->execute();
    }


    public function start($url){

        $mailclass = new \Modules\CRMPhone\Config\Handler;
        $mailclass->showLeftMenu($url);
        $mailclass->showTopMenu($url);
        
        $this->bildBD($url);
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","lc","tmenu");
        $view->ViewCastom("defaults","crmphone","thinks");
        $view->ViewCastom("defaults","lc","lmenu");
    }

    public function bildBD($url){
        $ses = $_SESSION["id"];
        $orm = new Orm;
        \Core\Values\Val::$helper["Thinks"] = $orm->select("id,region,sity,adres,fio,phone1,phone2,phone3,phone4,history,date_last")
        ->where("
        agent_id = $ses"
          )->from("crm_phone_base")->limit(50)->execute()->object();
        
    }

}