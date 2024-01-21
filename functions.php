<?php

use App\Http\AddMenuPage\MyCustomMenuPage;
use Core\AdminMenuPage\MenuManager;

add_action('init', function() {
    MenuManager::registerMenu(new MyCustomMenuPage());
});