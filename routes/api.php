<?php

use Core\Router\Route;

Route::get('/api/get-test/(\w+)', 'Home/TestController@find');
Route::post('/api/create-test', 'Home/TestController@store');