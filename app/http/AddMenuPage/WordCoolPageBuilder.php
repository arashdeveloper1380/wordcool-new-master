<?php

namespace App\Http\AddMenuPage;

use Core\AdminMenuPage\Contracts\AdminMenuPageInterface;

class WordCoolPageBuilder implements AdminMenuPageInterface
{
    public function getMenuTitle(): string{
        return 'صفحه ساز وردکول';
    }

    public function getMenuSlug(): string{
        return 'wordcool-page-builder';
    }

    public function getCapability(): string{
        return 'manage_options';
    }

    public function renderContent(): void{
        blade('wordcoolpagebuilder.index');
    }

}
