<?php

namespace App\Events;

class UserRegisteredEvent {

    public $user;

    public function __construct($user){
        $this->user = $user;
    }

}