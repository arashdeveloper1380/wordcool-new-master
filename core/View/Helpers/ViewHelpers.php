<?php

use Core\View\View;

if(!function_exists('blade')){
    function blade($viewPath, $data = []){
        View::blade($viewPath, $data);
    }
}

if(!function_exists('render')){
    function render($viewPath, $data = []){
        View::render($viewPath, $data);
    }
}