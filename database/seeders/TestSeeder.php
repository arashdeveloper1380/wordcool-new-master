<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder{

    public function run(){
        $users = [
            [
                'name' => 'ahbar'
            ],
            [
                'name' => 'kazim',
            ],
        ];

        foreach ($users as $user) {
            Test::create($user);
        }
    }

}