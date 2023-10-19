<?php

use Core\Router\Route;

if(!function_exists('rget')){
    function rget($url, $handler){
        Route::get($url, $handler);
    }
}

if(!function_exists('rpost')){
    function rpost($url, $handler){
        Route::post($url, $handler);
    }
}

if(!function_exists('rput')){
    function rput($url, $handler){
        Route::put($url, $handler);
    }
}

if(!function_exists('rdelete')){
    function rdelete($url, $handler){
        Route::delete($url, $handler);
    }
}