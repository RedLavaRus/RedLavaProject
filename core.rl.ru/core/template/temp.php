<?php

namespace Core\Template;

/*
       Temp::add("var_name","var_value");
       Temp::addHead("var_name","var_value");
       $result->wiev("tem","file");// название шаблона, встраиваемый файл.


       шаблон состоит из
       Хеадер, нав, фоотер
       */
class Temp
{
    public static $config;

    public static $var;
    public static $header;
    public static $head;
    public static $nav;
    public static $footer;

    public static $css;
    public static $js;

    public static $title;
    public static $keywords;
    public static $description;


    public function View($template,$file)//("default","index");
    {
        self::$config = new \Template\Defaults\Config;
        self::viewHead($template);
        self::viewNav($template);
        self::viewHeader($template);
        self::viewBody($template,$file);
        self::viewFooter($template);
    }

    public static function viewHead($template){
        $config = self::$config;
        include_once MYPOS."/template"."/".$template. '/blocks/head.php';
        
    }

    public static function viewNav($template){
        
        $config = self::$config;
        include_once MYPOS."/template"."/".$template. '/blocks/nav.php';
    }

    public static function viewHeader($template){
        $config = self::$config;
        include_once MYPOS."/template"."/".$template. '/blocks/header.php';
        
    }

    public static function viewBody($template,$file){
        $config = self::$config;
        include_once MYPOS."/template"."/".$template.$file.'.php';
    }

    public static function viewFooter($template){
        $config = self::$config;
        include_once MYPOS."/template"."/".$template. '/blocks/footer.php';
        
    }

    public static function addHeadTitle($value)
    {
        self::$title .= $value;

    }

    public static function addHeadDescription($value)
    {
        self::$description .= $value;
        
    }

    public static function addHeadKeywords($value)
    {
        self::$keywords .= $value;
        
    }

    public static function addHeadJS($value)
    {
        self::$js .= $value;
        
    }

    public static function addHeadCSS($value)
    {
        self::$css .= $value;
    }
}