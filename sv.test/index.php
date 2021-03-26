<?php



define("MYPOS" , __DIR__);

spl_autoload_register(function ($class_name) {   
    $class_name = str_replace('\\','/',$class_name);
    $class_name = strtolower($class_name);
    include_once MYPOS."/".$class_name . '.php';    
});

include_once __DIR__."/core/helper/debug.php";
debug(true);

$start = new Core\Event\Manager;
$start->start();

var_dump("<pre>", \Core\Helper\Helper::$hepler, "</pre>");
