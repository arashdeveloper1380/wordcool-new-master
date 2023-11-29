<?php

if(!function_exists('html')){
    function html(){
        return new Core\HtmlGenerator\HtmlGenerator();
    }
}