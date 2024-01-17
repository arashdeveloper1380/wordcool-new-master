<?php

use App\Http\Controllers\Home\HomeController;
use Core\Router\Route;

require_once BASE_PATH . '/app/kernel.php';

// params => ([\w-]+) support a-z A-Z 0-9 -_
// params => (\w+) support a-z A-Z 0-9 _
// Query String => \?id=.*

// Route::get('/users/search', function($params) {
//     echo $params['name'];
    
// });

// rget('/(\w+)/test/(\w+)\?age=.*',function($name, $lname){
//     echo "name is : {$name} and lname is : {$lname} and Age is : {$_GET['age']}";
// });

Route::get('/blog', function(){
    echo "blog page";
});

// Route::get('/(\w+)/test/(\w+)\?age=.*','Home/HomeController@index');
Route::get('/','Home/HomeController@index');

Route::get('/', function() {
    (new HomeController)->index();
}, '', 'AuthMiddleware');

Route::post('/store/(\w+)', function($id) {
    (new HomeController)->store($id);
}, '', 'AuthMiddleware');


Route::dispatch();