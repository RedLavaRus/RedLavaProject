<?php
namespace Modules\CRMPhone\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Handler
{
    public static $lmenu;
    public static $tmemu;
    public static $clientinfo;

    public function install(){

        $dd = new Create();
        $dd -> create("crm_phone_base")
        ->add("region","VARCHAR","255","not null","Регион (кавказ)")
        ->add("sity","VARCHAR","255","not null","Город")
        ->add("adres","VARCHAR","255","not null","Адрес")
        ->add("fio","VARCHAR","255","not null","Ф.И.О.")
        ->add("phone1","VARCHAR","255","not null","телефон")
        ->add("phone2","VARCHAR","255","not null","дополнительный телефон")
        ->add("phone3","VARCHAR","255","not null","дополнительный телефон")
        ->add("phone4","VARCHAR","255","not null","дополнительный телефон")
        ->add("type","VARCHAR","255","not null","тип контакта (холодный теплый)")
        ->add("agent_id","VARCHAR","255","not null","ид агента")
        ->add("date_add","VARCHAR","255","not null","Дата добавления")
        ->add("date_last","VARCHAR","255","not null","Дата последнего использования")
        ->add("date_next","VARCHAR","255","not null","Дата следующего использования")
        ->add("status","VARCHAR","255","not null","Статус последнего обращения")
        ->add("history","text","","","История обращения Массив!")
        ->add("contract_number","VARCHAR","255","not null","номер договора или заявки")
        ->add("special_group","VARCHAR","255","not null","специальная подгруппа")
        ->add("group","VARCHAR","255","not null","группа доступа")
        ->add("permission","text","","","право доступа");
        $dd ->execute();


        $orm = new Orm;
        $orm->insert("
        group = default,
        url =  /lc/showclient/,
        name = Показать клиента,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();

        $orm1 = new Orm;
        $orm1->insert("
        group = default,
        url =  /lc/importclient/,
        name = импорт клиента,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();



        $orm2 = new Orm;
        $orm2->insert("
        url = lc/showclient,
        class = Modules\CRMPhone\Config\Handler,
        func = start,
        Описание = Показать клиента
        ")            
        ->from("router")->execute();

        $orm3 = new Orm;
        $orm3->insert("
        url = lc/importclient,
        class = Modules\CRMPhone\Config\Handler,
        func = importclient,
        Описание =импорт клиента
        ")            
        ->from("router")->execute();
    
    }
    public function start($url){
      if(isset($url["post"]) and $url["post"] != null){
        $this->genuUpdateClient($url);
      }else{
          $this->showContentClient($url);
      }
        //$this->bild($url);

    }

    public function importclient($url){
        
        $this->showLeftMenu($url);
        $this->showTopMenu($url);
        
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","lc","tmenu");
        $view->ViewCastom("defaults","crmphone","addclient");
        $view->ViewCastom("defaults","lc","lmenu");
    }

    public function showLeftMenu($url){

        $orm = new Orm;
        $db_tb = $orm->select("id,group,url,name,class,permission")
        ->from("lc_lmenu")->execute()->object();
        $x=0;
        
        foreach($db_tb->object as $item){
            if(\Core\Permission\Config\Right::accessRights($item["permission"]))
            {
            $leftMenuArray[$x]["id"] = $item["id"];
            $leftMenuArray[$x]["url"] = $item["url"];
            $leftMenuArray[$x]["name"] = $item["name"];
            $leftMenuArray[$x]["class"] = $item["class"];
            $leftMenuArray[$x]["group"] = $item["group"];
            }
            $x++;
        }

        //var_dump("<pre>",$leftMenuArray);
        \Modules\Lc\Config\Handler::$lmenu = $leftMenuArray;

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

    public function showContentClient($url){
        
        $this->showLeftMenu($url);
        $this->showTopMenu($url);
        $this->genClient($url);
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","lc","tmenu");
        $view->ViewCastom("defaults","crmphone","index");
        $view->ViewCastom("defaults","lc","lmenu");
    }

    public function genClient($url){
        
        $orm = new Orm;
        $time_date_its = time();
        $orm->select("id,region,sity,adres,fio,phone1,phone2,phone3,phone4,history")
        ->where("
        date_last = 1"
          )->from("crm_phone_base")->limit(1)->execute()->object();
          //var_dump( $orm ->object());

          self::$clientinfo = $orm->object();
    }
    public function genuUpdateClient($url){

        //var_dump($url);
        //update
        $this->updateHistoryList($this->createNewHistory($url));

        $this->showContentClient($url);

    }
    public function createNewHistory($url){
        //var_dump($url);
        $id = $url["post"]["id"];
        $orm = new Orm;
        $dts = $orm->select("id,region,sity,adres,fio,phone1,phone2,phone3,phone4,history")
        ->where("
        id = $id"
          )->from("crm_phone_base")->limit(1)->execute()->object();
          foreach($dts->object as $ct){
    
            $sl = $ct;
        }
        $total_his = null;
        $oldHistory = $this->creatingStory($sl["history"]);  
        if(empty($oldHistory)) {
            
        }else{
        foreach($oldHistory as $his){
            $total_his[] = $his;
        }
        }
        $mallArray["status"]= $url["post"]["dzen"];
        $date_d1 = $url["post"]["date_lts"];
        $mallArray["comment"]= $url["post"]["comment"];
        $mallArray["id_agent"]= $_SESSION["id"];
        
        //var_dump( $date_d1);
        switch($mallArray["status"]){
            case "no_reply":
                $n = 7;
                break;
                
            case "Unavailable":
                $n = 30;
                break;
                
            case "ttk":
                $n = 360;
                break;
                
            case "No_DHW":
                $n = 360;
                break;
                
            case "envelope":
                $n = 90;
                break;
                
            case "refusal":
                $n = 90;
                break;
                
            case "rude_refusal":
                $n = 360;
                break;
                
            case "thinks":
                $n = 1;
                break;
                
            case "application":
                $n = 360;
                break;

            default:
                $n = 999;
        }

        //$lust = substr(date('UTC', strtotime($date_d1)),0,10);
        if($date_d1 == 0){
            $nextSteap = time() + (86400 * $n);
        }else{
            $nextSteap   = substr(date('UTC', strtotime($date_d1)),0,10);
        }
        
        var_dump($date_d1 );
        $mallArray["date"]=time();
        $total_his[] = $mallArray;
        
        $res = $this->analysisHistory($total_his);
        //var_dump("<pre>",$res);
        $orm1 = new Orm;
        $orm1->update("history = $res")->where("
        id = $id"
          )->from("crm_phone_base")->execute();

        $orm2 = new Orm;  
        $orm2->update("date_last = $nextSteap")->where("
        id = $id"
        )->from("crm_phone_base")->execute();

        $ag_id = $_SESSION["id"];
        $orm3 = new Orm;  
        $orm3->update("agent_id = $ag_id")->where("
        id = $id"
        )->from("crm_phone_base")->execute();

        $sts_name = $mallArray["status"];
        $orm4 = new Orm;  
        $orm4->update("status = $sts_name")->where("
        id = $id"
        )->from("crm_phone_base")->execute();

        
    }
    public function updateHistoryList($array){
        
    }

    public function bildAddXML($url){
        $view = new \Core\Template\Temp;
        $view->ViewCastom("defaults","lc","tmenu");
        $view->ViewCastom("defaults","crmphone","addclient");
        $view->ViewCastom("defaults","lc","lmenu");

    }

    
    //var_dump($ttr);echo "<br><br><br>";
    
    public function creatingStory($array){
        
        return unserialize($array);
    }
    public function analysisHistory($array){

        return serialize($array);
    }

    public function ruStatus($status){
        switch($status){
            case "no_reply":
                return "Не ответил";
                break;
                
            case "Unavailable":
                return "Недоступен";
                break;
                
            case "ttk":
                return "Абонент ТТК";
                break;
                
            case "No_DHW":
                return "Нет ТХВ";
                break;
                
            case "envelope":
                return "Конверт";
                break;
                
            case "refusal":
                return "Отказ";
                break;
                
            case "rude_refusal":
                return "Грубый отказ";
                break;
                
            case "thinks":
                return "Думает";
                break;
                
            case "application":
                return "Заявка";
                break;

            default:
                return "Ошибка";
        }
    }
    public function createHistory($array){
        $array_hist = $this->creatingStory($array);
        $result = null;
        if(empty($array_hist)) return null;
        
        foreach($array_hist as  $his){
            $login = $his["id_agent"];

           $namer = new \Modules\ExpansionUser\Config\Handler;
           $name_auth = $namer->showFIO($login,"min");

            $date = date("d-m-Y",$his["date"]);

            $status = $this->ruStatus($his["status"]);

            

            $result[] = '<div class="form_left ">'.$name_auth.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="data ">'.$date.'</div>
            <div class="status marg">'.$status.' </div>
            <div class="comment marg">'.$his["comment"].'</div>
            </div>';
        }
        return $result;
    }


}