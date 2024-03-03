<?php

namespace Core\PostType;

use Exception;

class RegisterPostType {

    public static function register(string $class) : void{
        $className = $class;
        if(!class_exists($className)){
            throw new Exception("{$className} is not found");
        }
        $object = new $className();
        $object->handle();
    }
    
}