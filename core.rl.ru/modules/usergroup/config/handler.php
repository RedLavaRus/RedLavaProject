<?php
namespace Modules\UserGroup\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Handler
{
    public function install()
    {
        $dd = new Create();
        $dd -> create("user_group")
        ->add("id_user","VARCHAR","255","not null","Урл страницы")
        ->add("group_name","VARCHAR","255","not null","Класс страницы");
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
    public function returnListUserGroup($id){
        $orm = new Orm;
        $result_sql = $orm->select("group_name")
        ->where("id_user = $id")
        ->from("user_group")->execute()->object();

        return $result_sql->object;
    }
    public function returnListUserInGroup($group_name){
        $orm = new Orm;
        $result_sql = $orm->select("id_user")
        ->where("group_name = $group_name")
        ->from("user_group")->execute()->object();

        return $result_sql->object;
    }
}
?>