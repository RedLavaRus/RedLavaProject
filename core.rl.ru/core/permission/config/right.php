<?php
namespace Core\Permission\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Right
{
    public static function accessRights($right){
        if($right == "all") return true;
        if($right == "auth" ){
            if(isset($_SESSION["id"]) and $_SESSION["id"]>= 1) {
                return true;
            }else{
                return false;
            }
        }
        $mdr = new \Core\Permission\Config\Handler;
        $res = $mdr->returnPexUser($_SESSION["id"]);
        //var_dump($_SESSION["id"]);
        if($res == null) return false;
        if(in_array("admin",$res)) return true;
        return  in_array($right,$res);
    }

    public static  function displayRight(){
        if(isset($_SESSION["id"]) and $_SESSION["id"] >= 1){

        }else{
            \Core\Errors\E403::show();
        }
    }

    public static function trueOrDie($right){
        if(!self::accessRights($right)) die();
    }


}
?>