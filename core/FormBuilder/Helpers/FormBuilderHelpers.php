<?php

if(!function_exists('form')){
    function form(string $action, string $method){
        return new Core\FormBuilder\FormBuilder($action, $method);
    }
}