<?php

use App\Http\AddMenuPage\MyCustomMenuPage;
use App\Http\AddMenuPage\WordCoolPageBuilder;
use Core\AdminMenuPage\MenuManager;

add_action('init', function() {
    MenuManager::registerMenu(new MyCustomMenuPage());
    MenuManager::registerMenu(new WordCoolPageBuilder());
});