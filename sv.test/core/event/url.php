<?php

namespace Core\Event;

class Url{

    public function url_gen(){
        $url =   $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->gen_url($url);
        $this->gen_get($url);
        $this->gen_post($url);
    }

//генерация параметра url
    public function gen_url($url){
        $url = explode('?', $url);
        $url1 = explode('/', $url[0]);
        var_dump($url1);
        $param_num_arr = 0;
        foreach($url1 as $par_url){
            \Core\Helper\Helper::$hepler["url"]["adress"][$param_num_arr] = $par_url;
            $param_num_arr++;
        }
    }


//генерация параметра get
    public function gen_get($url){
        $url = explode('?', $url);
        $url1 = explode('&', $url[1]);
        foreach($url1 as $url_get_param){
            $url_get_arr = explode('=', $url_get_param);
            \Core\Helper\Helper::$hepler["url"]["get"][$url_get_arr[0]] = $url_get_arr[1];
        }        
    }


//генерация параметра post
    public function gen_post($url){
        \Core\Helper\Helper::$hepler["url"]["post"] = $_POST;
    }
}