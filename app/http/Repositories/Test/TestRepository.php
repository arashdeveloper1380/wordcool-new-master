<?php

namespace App\Http\Repositories\Test;

use App\Models\Test;
use App\Http\Repositories\Test\Contracts\TestRepositoryContract;
use App\Http\Repositories\Test\Dto\CreateTestDto;
use Illuminate\Support\Facades\Response;

class TestRepository implements TestRepositoryContract {

    public function create(CreateTestDto $createDto){
        $test = Test::query()->create([
            "name"  => $createDto->getName(),
        ]);

        return resJson($test);
    }

    public function find(int $id) : ?Test{
        $test = Test::query()->find($id);
        return resJson($test);
    }

}