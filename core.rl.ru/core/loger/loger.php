<?php
namespace Core\Loger;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
  /*
  Класс крон, отвечает за автозапуск приложений через крон
  */
class Loger
{    /*
  Функция установки сео даты
  */
  public function install()
  {
      $dd = new Create();
      $dd -> create("loger")
      ->add("adres","VARCHAR","255","not null","Адрес страници")
      ->add("iduser","VARCHAR","255","not null","ид юзера")
      ->add("observer","VARCHAR","255","not null","куки")
      ->add("ipuser","VARCHAR","255","not null","ип юзера")
      ->add("timed","VARCHAR","255","not null","время действия");
      $dd ->execute();
  }
  public static function index()
  {
      //получить текущий адрес
      $adresUser = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    
      
      //Получить ид пользователя
      if (isset($_SESSION["id"]) and $_SESSION["id"]>= 1){
        $idUser = $_SESSION["id"];
      }else{
        $idUser = 0;
      }
      //Получить куки пользователя
      if (isset($_COOKIE['observer']) and ($_COOKIE['observer'] >= 1))
      {
        $coUser = $_COOKIE['observer'];
      }else{
        $coUser = rand(1000000,9999999);
        setcookie('observer',$coUser,time() + (86400 * 180));
      }
      //Получить ip пользователя
      $ipUser = \Libs\GuardPassHash\IpUser::GetIP();
      //Получить время
      $time = time();


      $orm = new Orm;
      $orm->insert("
      adres = $adresUser,
      iduser =  $idUser,
      observer = $coUser,
      ipuser = $ipUser,
      timed =$time
    ")            
    ->from("loger")->execute();
  }
}


?>