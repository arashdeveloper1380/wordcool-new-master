<?php

namespace Core\Event;

class Event {

    public static $listeners = [];

    public static function addListener($eventName, $listener){
        if(!isset(self::$listeners[$eventName])){
            self::$listeners[$eventName] = [];
        }
        self::$listeners[$eventName][] = $listener;
    }

    public static function fire($eventName, $eventData){
        if(isset(self::$listeners[$eventName])){
            foreach (self::$listeners[$eventName] as $listener){
                $obj = 'App\Listeners\\' . $listener;
                $obj = new $obj();
                $obj->handle($eventData);
            }
        }
    }

}