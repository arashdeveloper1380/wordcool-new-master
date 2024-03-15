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

if(!function_exists('config')){
    function config(){
        return require BASE_PATH . '/config/config.php';
    }
}

if(!function_exists('public_path')){
    function public_path(string $path) : string{
        return realpath(__DIR__ . '/../../') . '/public/' . $path;
    }
}

if (!function_exists('resJson')) { 
    function resJson($data, $status_code = 200, $headers = []) {
        http_response_code($status_code);
        foreach ($headers as $key => $value) {
            header("$key: $value"); 
        } 
        header("Content-Type: application/json"); 
        echo json_encode($data); exit(); 
    } 
}