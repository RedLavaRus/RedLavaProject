<?php
echo "install";
//install core

$i = new \Core\Router\Router;
$i -> install();
unset($i);
$i = new  Core\User\Init;
$i -> install();
unset($i);
$i = new \Core\Seo\Seo;
$i -> install();
unset($i);

$i = new \Core\Admin\Menu;
$i -> install();
unset($i);
$i = new Core\Ajax\Ajax;
$i -> install();


?>