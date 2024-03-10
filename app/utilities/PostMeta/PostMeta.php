<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

if(config()['post_meta'] === true){

    add_action(
        'carbon_fields_register_fields',
        'wordcoolPostMeta'
    );

    function wordcoolPostMeta(){
        Container::make('post_meta', __('اطلاعات') )
            ->where('post_type', '=','post')
            ->add_fields([
                Field::make('text', 'phone_number_arash', __('شماره تلفن'))
            ]);
    }

}