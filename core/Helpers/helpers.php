<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

if(!function_exists('route')){
    function route($url, $param = ''){
        if(empty($param)){
            return home_url() . $url;
        }else{
            return home_url() . $url . '/' . $param;
        }
    }
}

if(!function_exists('req')){
    function req(){
        return Request::capture();
    }
}

if(!function_exists('collection')){
    function collection(array $array = null){
        return new Collection($array);
    }
}