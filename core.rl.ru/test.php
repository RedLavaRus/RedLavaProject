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

       $test = new  \Modules\Lc\Config\Handler;
       $test ->install();
    }
}

?>