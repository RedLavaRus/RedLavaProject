<?php
namespace Core\Permission\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Handler
{
    public function install()
    {
        $group = new Create();
        $group -> create("group_permission")
        ->add("name","VARCHAR","255","not null","Название группы")
        ->add("permission","text","","not null","печерень привелегий, через запятую");
        $group ->execute();
    }

    //вернуть список привелегий группы
    public function returnPexGroup($group){
        $orm = new Orm;
        $result_sql = $orm->select("permission")
        ->where("name = $group")
        ->from("group_permission")->execute()->object();

        foreach($result_sql->object as $pex){
            $grourex=null;
            $grourex = explode(",",$pex["permission"]);
            foreach($grourex as $pexed){
                $grouplist[]=$pexed;
            }
        }
        if(isset($grouplist)) {return  $grouplist; }else {return null;}
       
    }

    //вернутрь список привелегий пользователя
    public function returnPexUser($id){

        $groupin = new \Modules\UserGroup\Config\Handler;
        $listgroup = $groupin -> returnListUserGroup($id);

        
        foreach($listgroup  as $nameGroup){
            $pex[] = $this->returnPexGroup($nameGroup["group_name"]);
        }

        foreach($pex as $p)
        {
            if(isset($p)){
                foreach($p as $p1)
                {
                    $rexlist[] =$p1;
                }
            }
        }
            
            return $rexlist;

    }
   


}
?>