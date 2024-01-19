<?php

use Core\Router\Route;
use App\Http\Html\ShortCodes\SimpleShortcode;

// register Middlewares
Route::addMiddleware('AuthMiddleware');



// register Shortcodes
$shortcodeHandler = new \Core\ShortCode\ShortCode();
$shortcodeHandler->register('SimpleShortcode');