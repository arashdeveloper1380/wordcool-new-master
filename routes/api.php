<?php

use App\Http\Controllers\Home\HomeController;
use Core\Router\RouteApi;

RouteApi::get(
    '/api/users', 
    'Home/HomeController@api', 
);

RouteApi::dispatch();