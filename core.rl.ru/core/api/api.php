<?php
namespace Core\Api;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
  /*
  Класс крон, отвечает за автозапуск приложений через крон
  */
class Api
{    /*
  Функция установки апи
  */
  public function install()
  {
      $dd = new Create();
      $dd -> create("api")
      ->add("fun","VARCHAR","255","not null","Урл страницы")
      ->add("class","VARCHAR","255","not null","Класс страницы")
      ->add("function","VARCHAR","255","not null","Функия вызова")
      ->add("permission","text","","","право доступа");
      $dd ->execute();
  }
  //работа с апи функциями
  public static function show($url)
  {
    $fun = $url["get"]["func"];
    
    $orm = new Orm;
    $orm->select("class,function,permission")
    ->where("fun = $fun")
    ->from("api")->limit(1)->execute()->object();
    $class = $orm->object[0]["class"];
    $function = $orm->object[0]["function"];
    $permission = $orm->object[0]["permission"];


    //$pex_ass = new \Core\User\Acsester;
    //$pex_ass->permission($permission);

    $dop = new $class;
    $dop -> $function($url);
    die();  
  }
}


?>