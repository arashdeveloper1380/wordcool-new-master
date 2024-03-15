<?php

namespace App\Http\Repositories\Test\Dto;

class CreateTestDto {

    public function __construct(
        private readonly string $name
    ){}

    public function getName() {
        return $this->name;
    }

}