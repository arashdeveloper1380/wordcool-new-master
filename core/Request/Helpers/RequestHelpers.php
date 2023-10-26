<?php

use Core\Request\Request;

if(!function_exists('request')){
    function request(){
        $request = new Request();
        return $request;
    }
}