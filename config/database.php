<?php

use Illuminate\Database\Capsule\Manager as DB;

// Eloquent
$db = new DB;
$db->addConnection([
    'driver' => $_ENV['DB_CONNECTION'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$db->setAsGlobal();
$db->bootEloquent();

// Crocel
$params = [
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'prefix'    => 'wp_'
];
Corcel\Database::connect($params);
