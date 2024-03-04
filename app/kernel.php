<?php

use Core\Router\Route;
use App\Http\Html\ShortCodes\SimpleShortcode;
use App\Http\PostType\BookPostType;
use Core\PostType\RegisterPostType;

// register Middlewares
Route::addMiddleware('AuthMiddleware');


// register Shortcodes
$shortcodeHandler = new \Core\ShortCode\ShortCode();
$shortcodeHandler->register('SimpleShortcode');


// register PostTypes
RegisterPostType::register(BookPostType::class);