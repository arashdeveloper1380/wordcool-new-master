<?php

use Carbon_Fields\Carbon_Fields;

require_once 'ThemeOption.php';
require_once 'PostMeta/PostMeta.php';

add_action('after_setup_theme', 'wordcoolThemeOptionLoad');

function wordcoolThemeOptionLoad(){
    Carbon_Fields::boot();
}