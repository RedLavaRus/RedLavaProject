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
            
            $leftMenuArray[$x]["id"] = $item["id"];
            $leftMenuArray[$x]["url"] = $item["url"];
            $leftMenuArray[$x]["name"] = $item["name"];
            $leftMenuArray[$x]["class"] = $item["class"];
            $leftMenuArray[$x]["group"] = $item["group"];
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
        $orm->select("id,region,sity,adres,fio,phone1,phone2,phone3,phone4,history")
        ->where("
        id = 1"
          )->from("crm_phone_base")->limit(1)->execute()->object();
          //var_dump( $orm ->object());

          self::$clientinfo = $orm->object();
    }
    public function genuUpdateClient($url){

        var_dump($url);
        //update
        $this->showContentClient($url);
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