<?php
/**
 * Конфиругационный файл
 */
class CFG
{
    public static $db_name = 'redlava';//Название базы данных
    public static $db_user = "root";//Пользователь базы данных
    public static $db_pass = "root";//Пароль от базы данных
    public static $db_host = "127.0.0.1";//Адрес базы данных
    public static $db_port = "3306";//Порт базы данных
    public static $db_code = "utf8";//Порт базы данных
    public static $debag   =true;//Порт базы данных
    public static $auth_type   = "api";//Тип Авторизации
    public static $minimum_login  = 4;//Минимальная длина логина
    public static $maximum_login  = 15;//Минимальная длина логина
    public static $minimum_password   = 8;//Минимальная длина пароля
    public static $maximum_password   = 16;//Минимальная длина пароля
    public static $salt   = "usy@#2jkw";//Статичная соль
    public static $loger   = true;//Статичная соль

    public static $mail_host        = "smtp.yandex.ru";     //Host почты
    public static $mail_port        = "465";                //Порт почты
    public static $mail_login       = "gakman@yandex.ru";   //Адрес отправления почты
    public static $mail_password    = "kill7777";           //Пароль от почты

    public static $telegram_token       = "1390767167:AAEQYQDdCKkt3BVx_CEUNo7vSZr7YPfT_Dg";
    public static $telegram_chat        = "477850396";

    public static function debag($status = true){
        if($status)
        {
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
        }
    }
}

?>