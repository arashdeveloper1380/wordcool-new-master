<?php

if(!function_exists('html')){
    function html(){
        return new Core\HtmlGenerator\HtmlGenerator();
    }
}

if(!function_exists('createElement')){
    function createElement (string $tagName, array $attributes = [], $children = []){
        return \Core\HtmlGenerator\Factory\HtmlGenerateFactory::createElement($tagName, $attributes, $children);
    }
}