<?php

if(!function_exists('storage')){
    function storage($basePath){
        return new \Core\FileStorage\FileStorage($basePath);
    }
}