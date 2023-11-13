<?php

use Core\Event\Event;

if(!function_exists('addListener')){
    function addListener($event, $listener){
        Event::addListener($event, $listener);
    }
}

if(!function_exists('fire')){
    function fire($event, $eventClass){
        Event::fire($event, $eventClass);
    }
}