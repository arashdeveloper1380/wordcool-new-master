<?php

use App\Http\Controllers\Home\HomeController;

use Core\Router\Route;
use Illuminate\Support\Str;

require_once BASE_PATH . '/app/kernel.php';
require_once BASE_PATH . '/routes/api.php';


// params       =>      ([\w-]+) support a-z A-Z 0-9 -_
// params       =>      (\w+) support a-z A-Z 0-9 _
// Query String =>      \?id=.*

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


Route::get(
    '/get-posts-by-category/(\w+)', 
    'Home/HomeController@display_category_posts'
);


Route::get('/form', 'Form/FormController@index');

Route::post('/form-store', 'Form/FormController@store');

Route::post('/form-store-validator', 'Form/FormController@storeValdator');


Route::get('/collection', function(){
    $cl = collection([1, 2, 3, 4, 5]);

    
    $cl_filter = $cl->filter(function($key, $value){
        return $value > 2;
    });

    blade('collection', compact('cl', 'cl_filter'));
});

Route::dispatch();