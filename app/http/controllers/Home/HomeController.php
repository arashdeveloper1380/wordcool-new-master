<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Core\Request\Request;

class HomeController extends Controller{

    public function index(){
        $req = new Request();
        dd($req->all());
    }

}