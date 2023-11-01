<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as DB;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        $name = "arash";
        $dbhost = $_ENV['DB_CONNECTION'];

        blade('index', compact('name','dbhost'));

        // render('index', compact('name'));

        $users = DB::table('wp_posts')->get();
        
    }

}