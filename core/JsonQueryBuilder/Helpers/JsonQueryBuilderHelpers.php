<?php

use Core\JsonQueryBuilder\JsonQueryBuilder;

if(!function_exists('jsqb')){
    function jsqb($filepath){
        $jsqb = new JsonQueryBuilder($filepath);
        return $jsqb;
    }
}
