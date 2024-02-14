<?php

class Boot {

    public function __construct(){
        self::constants();
        self::init();
    }

    public function constants(){
        define('BASE_PATH', realpath(__DIR__ . '/../'));
        define('BASE_URL', plugin_dir_url(__FILE__));
    }

    public function init(){
        register_activation_hook(__FILE__, [$this, 'activePlugin']);
        register_deactivation_hook(__FILE__, [$this, 'deactivePlugin']);

        self::requirments();
    }

    public function requirments(){
        require_once BASE_PATH . '/routes/web.php';
        require_once BASE_PATH . '/functions.php';
    }

    public function activePlugin(){
    }

    public function deactivePlugin(){
        //
    }
}

new Boot;