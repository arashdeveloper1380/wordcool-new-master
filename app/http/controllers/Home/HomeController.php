<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Corcel\Model\Post;
use Illuminate\Database\Capsule\Manager as DB;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        $name = "arash";

        blade('index', compact('name'));

        // render('index', compact('name'));

        // var_dump(Post::all());
        // var_dump(DB::table('wp_users')->first());
    }

}