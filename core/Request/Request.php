<?php

namespace Core\Request;

use Core\Request\Contracts\RequestInterface;

class Request implements RequestInterface{

    public function get($key, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function set($key, $value){
        $_GET[$key] = $value;
    }

    public function all(){
        return $this->data;
    }

    public function has($key){
        return isset($this->data[$key]);
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

    public function getString($key, $default = ''){
        $value = $this->get($key, $default);
        return is_string($value) ? $value : $default;
    }

    public function getInt($key, $default = 0){
        $value = $this->get($key, $default);
        return is_numeric($value) ? (int) $value : $default;
    }

    public function getFloat($key, $default = 0.0){
        $value = $this->get($key, $default);
        return is_numeric($value) ? (float) $value : $default;
    }

    public function getArray($key, $default = []){
        $value = $this->get($key, $default);
        return is_array($value) ? $value : $default;
    }

    public function getBoolean($key, $default = false){
        $value = $this->get($key, $default);
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

}