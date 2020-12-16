<?php
namespace Modules\ExpansionUser\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

/*
Класс расширения данных о пользователе

*/
class Handler
{
    
    public function install(){

        $dd = new Create();
        $dd -> create("Expansion_User")
        ->add("id_user","INT","255","not null","Ид пользователя")
        ->add("last_name","VARCHAR","255","not null","Фамилия")
        ->add("name","VARCHAR","255","not null","Имя")
        ->add("name_patronymic","VARCHAR","255","not null","Отчество");
        $dd ->execute();
    }
    public function showFIO($id,$type = "full"){
        
        $orm = new Orm;
        $res_io = $orm->select("last_name, name, name_patronymic")
        ->where("id_user = $id")
        ->from("Expansion_User")->limit(1)->execute()->object();

        //var_dump("<pre>",$res_io->object[0]["id_user"]);
        switch ($type) {
            case "full":
                return $res_io->object[0]["last_name"]." ".$res_io->object[0]["name"]." ".$res_io->object[0]["name_patronymic"];
                break;

            case "name"://mb_substr($name,0,1,"UTF-8")
                return $res_io->object[0]["name"];
                break;

            case "min":
                return $res_io->object[0]["last_name"]." ".mb_substr($res_io->object[0]["name"],0,1,"UTF-8").". ".mb_substr($res_io->object[0]["name_patronymic"],0,1,"UTF-8").". ";
                break;
                
            default:
                return "error:nonFuntType";

                
        }

    }
}