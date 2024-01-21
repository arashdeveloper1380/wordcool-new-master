<?php

namespace Core\AdminMenuPage;

use Core\AdminMenuPage\Contracts\AdminMenuPageInterface;
use Core\AdminMenuPage\Contracts\MenuPageInterface;

class MenuManager{
    
    public static function registerMenu(AdminMenuPageInterface $menuPage): void
    {
        add_action('admin_menu', function() use ($menuPage) {
            add_menu_page(
                $menuPage->getMenuTitle(),
                $menuPage->getMenuTitle(),
                $menuPage->getCapability(),
                $menuPage->getMenuSlug(),
                [$menuPage, 'renderContent']
            );
        });
    }

    public static function registerSubMenu(AdminMenuPageInterface $menuPage, string $parentSlug): void
    {
        add_action('admin_menu', function() use ($menuPage, $parentSlug) {
            add_submenu_page(
                $parentSlug,
                $menuPage->getMenuTitle(),
                $menuPage->getMenuTitle(),
                $menuPage->getCapability(),
                $menuPage->getMenuSlug()
            );
        });
    }
}
