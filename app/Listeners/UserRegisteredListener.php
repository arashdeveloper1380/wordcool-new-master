<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;

class UserRegisteredListener {

    public function handle(UserRegisteredEvent $event){
        echo "Event Data : {$event->user}";
    }

}