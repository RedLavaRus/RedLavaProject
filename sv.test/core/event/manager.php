<?php

namespace Core\Event;

class Manager{
    public function start(){
        $url = new \Core\Event\Url;
        $url->url_gen();
    }
    
}