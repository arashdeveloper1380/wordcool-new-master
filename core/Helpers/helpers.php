<?php

use Illuminate\Database\Capsule\Manager as DB;

if(!function_exists('dd')){
    function dd($value){
        dump($value);
    }
}

if(!function_exists('db')){
    function db(){
        return new DB;
    }
}

