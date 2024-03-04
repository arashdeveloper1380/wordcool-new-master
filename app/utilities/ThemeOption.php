<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action(
    'carbon_fields_register_fields',
    'wordcoolThemeOption'
);

function wordcoolThemeOption(){

    Container::make('theme_options', __('صفحه تنظیمات'))
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'شعار سایت' ),
        ));
        
}


if(config()['theme_option'] == true){

    add_action('after_setup_theme', 'crb_load');

    function crb_load(){
        Carbon_Fields::boot();
    }
}