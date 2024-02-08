<?php

use Core\Redirect\Redirect;

if(!function_exists('redirect')){

    function redirect(){
        return new Redirect;
    }

}

