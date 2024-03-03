<?php


use App\Http\AddMenuPage\MyCustomMenuPage;
use App\Http\AddMenuPage\WordCoolPageBuilder;
use Core\AdminMenuPage\MenuManager;
use PostTypes\PostType;
use PostTypes\Taxonomy;

add_action('init', function() {
    MenuManager::registerMenu(new MyCustomMenuPage());
    MenuManager::registerMenu(new WordCoolPageBuilder());
});
