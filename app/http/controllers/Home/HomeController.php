<?php

namespace App\Http\Controllers\Home;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use Core\Event\Event;

class HomeController extends Controller{

    public function index(){
        
        addListener(
            'UserRegisteredEvent', 
            'UserRegisteredListener'
        );

        fire(
            'UserRegisteredEvent', 
            new UserRegisteredEvent('narimani')
        );
        
    }

}