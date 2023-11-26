<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . './config/database.php';

use Psy\Shell;

$shell = new Shell();
$shell->run();