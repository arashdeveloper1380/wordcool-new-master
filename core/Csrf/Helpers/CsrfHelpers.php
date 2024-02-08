<?php

use Core\Csrf\Csrf;

if(!function_exists('csrf')){
    function csrf(){
        return new Csrf();
    }
}
if(!function_exists('csrf_token')){
    function csrf_token(){
        return csrf()->generateToken();
    }
}
if(!function_exists('csrf_check')){
    function csrf_check(){
        return csrf()->validateToken();
    }
}