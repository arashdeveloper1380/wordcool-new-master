<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if(config()['theme_option'] === true){

    add_action(
        'carbon_fields_register_fields',
        'wordcoolThemeOption'
    );
    
    function wordcoolThemeOption(){
    
        Container::make('theme_options', __('صفحه تنظیمات'))
            ->add_fields([
                Field::make( 'text', 'text_arash', 'شعار سایت' ),
            ]);
            
    }

}