<?php

namespace Database\Seedders;

use App\Models\Test;
use Core\Seeder\Seeder;

class TestSeeder extends Seeder{

    public function __construct(Test $test){
        $this->model = $test;
    }

    protected $data = [
        'name' => 'ahbar',
    ];

}