<?php

use App\Http\Middlewares\AuthMiddleware;
use Core\Router\Route;

// params => ([\w-]+) support a-z A-Z 0-9 -_
// params => (\w+) support a-z A-Z 0-9 _
// Query String => \?id=.*

// Route::get('/users/search', function($params) {
//     echo $params['name'];
    
// });

// rget('/(\w+)/test/(\w+)\?age=.*',function($name, $lname){
//     echo "name is : {$name} and lname is : {$lname} and Age is : {$_GET['age']}";
// });

// // Route::get('/blog/(\w+)', function($id){
// //     echo "home $id";
// // });

// Route::get('/(\w+)/test/(\w+)\?age=.*','Home/HomeController@index');
// Route::get('/','Home/HomeController@index');

Route::addMiddleware('AuthMiddleware');
Route::get('/', function() {
    echo "ha vallah";
}, 'GET', 'AuthMiddleware');


Route::dispatch();