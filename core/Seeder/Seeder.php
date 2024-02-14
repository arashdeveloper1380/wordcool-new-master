<?php

namespace Core\Seeder;

use Core\Seeder\Contracts\SeederInterface;

class Seeder implements SeederInterface{

    protected $model;
    protected array $data;

    public function run() : void{
        foreach ($this->data as $data){
            $this->model->create($data);
        }
    }

    public function call(string $class): void{
        $class = 'Database\Seeders\\' . $class;
        if(class_exists($class)){
            $obj = new $class();
            $obj->run();
        }
    }

}