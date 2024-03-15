<?php

namespace App\Http\Repositories\Test\Contracts;

use App\Models\Test;
use App\Http\Repositories\Test\Dto\CreateTestDto;

interface TestRepositoryContract{

    public function create(CreateTestDto $createDto);

    public function find(int $id) : ?Test;

}