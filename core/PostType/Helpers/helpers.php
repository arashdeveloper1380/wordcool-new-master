<?php

use Core\PostType\RegisterPostType;

if(!function_exists('reg_postType')){
    function reg_postType(string $class) : void {
        RegisterPostType::register($class);
    }
}