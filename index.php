<?php

/**
 * Plugin Name: Arash Wordcool Framework
*/

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'bootstarp/boot.php';