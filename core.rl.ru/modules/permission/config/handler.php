<?php
namespace Modules\Permission\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Handler
{
    public function install()
    {
        $dd = new Create();
        $dd -> create("permission")
        ->add("name","VARCHAR","255","not null","Название группы или ид пользователя")
        ->add("type_usr","TEXT","","not null","Права доступа");
        $dd ->execute();
    }
    /*

    */
    public function showGroup(){
        if(isset($_SESSION["id"]) and $_SESSION["id"] >= 1)
        {
            $id_user = $_SESSION["id"];
        }else{
            return false;
        }
        return $this->returnGroupName($id_user);
       
    }

    public function returnGroupName($id){
        $orm = new Orm;
        $result_sql = $orm->select("group_name")
        ->where("id_user = $id")
        ->from("user_group")->execute()->object();
        foreach($result_sql->object as $item){
            $group[] = $item;
        }
        return $group;
    }

    public function showPEX($id){
        $array_group = $this->returnGroupName($id);
        foreach($array_group as $arr)
        {
            $orm = new Orm;
            $result_sql = $orm->select("type_usr")
            ->where("name = $arr")
            ->from("permission")->execute()->object();
            $resulter[] = $result_sql->object;
        }
        return $resulter;
    }
}
?>