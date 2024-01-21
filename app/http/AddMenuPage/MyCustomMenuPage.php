<?php

namespace App\Http\AddMenuPage;

use Core\AdminMenuPage\Contracts\AdminMenuPageInterface;

class MyCustomMenuPage implements AdminMenuPageInterface
{
    public function getMenuTitle(): string{
        return 'صفحه تستی';
    }

    public function getMenuSlug(): string{
        return 'my-custom-menu-page';
    }

    public function getCapability(): string{
        return 'manage_options';
    }

    public function renderContent(): void{
        blade('menu.index');
    }

}
