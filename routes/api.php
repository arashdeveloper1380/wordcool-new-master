<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Middlewares\AuthMiddleware;
use Core\Router\RouteApi;

RouteApi::get(
    '/api/users', 
    'Home/HomeController@index', 
    'AuthMiddleware'
);

RouteApi::dispatch();