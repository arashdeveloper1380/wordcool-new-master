<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Test\Dto\CreateTestDto;
use App\Http\Repositories\Test\TestRepository;
use App\Models\Test;

class TestController extends Controller {

    public $repository;

    public function __construct(){
        $this->repository = new TestRepository();
    }

    public function store(){
        $name = req()->get('name');
        $createDto = new CreateTestDto($name);
        $this->repository->create($createDto);
    }

    public function find(int $id) : ?Test{
        $this->repository->find($id);
    }

}