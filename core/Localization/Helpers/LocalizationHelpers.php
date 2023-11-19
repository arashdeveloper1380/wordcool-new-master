<?php

if(!function_exists('lang')){
    function lang($lang){
        return new Core\Localization\Localization($lang);
    }
}