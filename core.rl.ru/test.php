<?php
/**
 * Конфиругационный файл
 */
class Test
{
    public function start($url)
    {

        $url["post"]["login"] = "test1231123";
        $url["post"]["pass"] = "test2222";
        $url["post"]["email"] = "test@test.ru";
        //var_dump($url);
 //     http://core.rl.ru/?go=api&func=auth&login=urlrewrwe&pass=urlrewrwe
 //     http://core.rl.ru/?go=api&func=reg&login=urlrewrwe2&pass=urlrewrwe&email=admin@ya.ru
 //     http://core.rl.ru/user/exit/
       //$dd =  new \Modules\Auth\Config\Handler;
       //$d = $dd->auth($url);
       //var_dump($d);

       //$test = new  \Modules\CRMPhone\Config\Handler;
       //$test ->install();
      /* $orm1 = new \Core\Orm\Orm;
        $orm1->insert("
        group = default,
        url =  /lc/importclient/,
        name = импорт клиента,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();

        $orm3 = new \Core\Orm\Orm;
        $orm3->insert("
        url = lc/importclient,
        class = Modules\CRMPhone\Config\Handler,
        func = importclient,
        Описание =импорт клиента
        ")            
        ->from("router")->execute();

        $dd = new \Core\Orm\Create;
        $dd -> create("user_group")
        ->add("id_user","VARCHAR","255","not null","Урл страницы")
        ->add("group_name","VARCHAR","255","not null","Класс страницы");
        $dd ->execute();

        $dd = new \Modules\ExpansionUser\Config\Handler;
        var_dump($dd -> showFIO(25, "min"));


        $id = 1;
        $orm = new \Core\Orm\Orm;
        $dts = $orm->select("id,region,sity,adres,fio,phone1,phone2,phone3,phone4,history")
        ->where("
        id = $id"
          )->from("crm_phone_base")->limit(1)->execute()->object();

        foreach($dts->object as $ct){
    
            $sl = $ct;
        }
        $oldHistory = unserialize($sl["history"]);  
        foreach($oldHistory as $his){
          var_dump($his,"<br>");
          echo 1;
        }

        $mdr = new \Modules\Permission\Config\Handler;
        $res = $mdr->returnGroupName($_SESSION["id"]);
        var_dump($res );
        \Core\Permission\Config\Right::displayRight();

        $mdr = new \Core\Permission\Config\Handler;
        $res = $mdr->returnPexUser($_SESSION["id"]);
        var_dump("<pre>",$res );

        var_dump(\Core\Permission\Config\Right::accessRights("admin3"));
        $orm = new \Core\Orm\Orm;
        $orm->insert("
        group = default,
        url =  /lc/thinks/,
        name = Потанцеальные клиенты,
        class = item_menu,
        permission = all
        ")            
        ->from("lc_lmenu")->execute();

        $orm3 = new \Core\Orm\Orm;
        $orm3->insert("
        url = lc/thinks,
        class = Modules\CRMPhone\Controller\Thinks,
        func = start,
        Описание = Потанцеальные клиенты
        ")            
        ->from("router")->execute(); 


        $dd = new \Core\Orm\Create;
        $dd -> create("broad_static")
        ->add("zd_shpd","INT","11","not null","ЗАЯВОК НА ШПД")
        ->add("zd_tv","INT","11","not null","ЗАЯВОК НА ТВ")
        ->add("con_shpd","INT","11","not null","ПОДКЛЮЧЕНО ШПД")
        ->add("con_tv","INT","11","not null","ПОДКЛЮЧЕНО ТВ");
        $dd ->execute();   */     
        
        $dd = new \Core\Orm\Create;
        $dd -> create("broad_znanie")
        ->add("idagent","INT","11","not null","ИД АГЕНТА")
        ->add("name1","VARCHAR","11","not null","Название обучения")
        ->add("stat1","VARCHAR","11","not null","Статус обучения")
        ->add("name2","VARCHAR","11","not null","Название обучения")
        ->add("stat2","VARCHAR","11","not null","Статус обучения")
        ->add("name3","VARCHAR","11","not null","Название обучения")
        ->add("stat3","VARCHAR","11","not null","Статус обучения")
        ->add("name4","VARCHAR","11","not null","Название обучения")
        ->add("stat4","VARCHAR","11","not null","Статус обучения")
        ->add("name5","VARCHAR","11","not null","Название обучения")
        ->add("stat5","VARCHAR","11","not null","Статус обучения");
        $dd ->execute();

    }
}

?>