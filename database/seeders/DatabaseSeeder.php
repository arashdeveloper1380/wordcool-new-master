<?php

namespace Database\Seeders;

use Core\Seeder\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() :void{
        $this->call(TestSeeder::class);
    }

}