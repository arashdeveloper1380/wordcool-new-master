<?php

if(!function_exists('session')){
    function session(){
        return new \Core\Session\Session();
    }
}