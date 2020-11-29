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

       $dd =  new \Modules\Auth\Config\Handler;
       $d = $dd->auth($url);
       //var_dump($d);
    }
}

?>