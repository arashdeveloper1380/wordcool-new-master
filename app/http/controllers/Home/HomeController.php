<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Corcel\Model\Post;
use Core\Scheduler\Scheduler;
use Illuminate\Database\Capsule\Manager as DB;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        $name = "arash";

        blade('index', compact('name'));

        // render('index', compact('name'));

        // dd(Post::all());
        // dd(DB::table('wp_users')->first());

        dd(db()->table('wp_users')->first());
        
    }

}