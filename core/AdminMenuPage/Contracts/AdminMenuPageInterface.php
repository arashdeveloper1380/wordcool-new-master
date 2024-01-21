<?php

namespace Core\AdminMenuPage\Contracts;

interface AdminMenuPageInterface
{
    public function getMenuTitle(): string;

    public function getMenuSlug(): string;

    public function getCapability(): string;

    public function renderContent(): void;
}