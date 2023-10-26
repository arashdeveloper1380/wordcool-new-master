<?php

namespace Core\Request;

use Core\Request\Contracts\RequestInterface;

class Request implements RequestInterface{

    public function get($key = null, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function post($key = null, $default = null){
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    public function all(){
        return array_merge($_GET, $_POST);
    }

    public function input($key, $default = null){
        $value = $this->get($key, $default);
        return htmlspecialchars($value, ENT_QUOTES, 'htf-8');
    }

    public function method(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isPost(){
        return self::method() === 'POST';
    }

    public function isGet(){
        return self::method() === 'GET';
    }
}