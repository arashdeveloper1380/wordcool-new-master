<?php

namespace App\Http\Controllers\Home;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use Core\Event\Event;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        // $name = "arash";

        // blade('index', compact('name'));

        // render('index', compact('name'));

        // dd(Post::all());
        // dd(DB::table('wp_users')->first());

        // dd(db()->table('wp_users')->first());

        Event::addListener('UserRegisteredEvent', 'UserRegisteredListener');

        Event::fire('UserRegisteredEvent', new UserRegisteredEvent('arash narimani'));
        
    }

}