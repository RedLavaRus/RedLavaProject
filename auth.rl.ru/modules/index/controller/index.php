<?php
namespace Modules\Index\Controller;

use \Core\Template\Temp as Temp;

class Index
{
    public function index(){
       $result = new Temp;
       Temp::add("var_name","var_value");
       Temp::addHead("var_name","var_value");
       $result->wiev("tem","/index/file");// название шаблона, встраиваемый файл.
    }
}