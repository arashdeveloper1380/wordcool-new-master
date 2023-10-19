<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Middleware\CostomMiddleware;
use Core\Router\Route;

// params => ([\w-]+) support a-z A-Z 0-9 -_
// params => (\w+) support a-z A-Z 0-9 _
// Query String => \?id=.*

// Route::get('/users/search', function($params) {
//     echo $params['name'];
    
// });

// rget('/(\w+)/test/(\w+)\?id=.*',function(){
//     echo "home";
// });

// // Route::get('/blog/(\w+)', function($id){
// //     echo "home $id";
// // });

Route::get('/','Home/HomeController@index');
// // Route::get('/','HomeController@index');


Route::dispatch();