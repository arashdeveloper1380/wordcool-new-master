<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;

class UserRegisteredListener {

    public function handle(UserRegisteredEvent $event){
        db()->table('test')->insert(
            ['name' => $event->user]
        );
    }

}