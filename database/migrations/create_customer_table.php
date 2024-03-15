<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('wp_customer', function ($table)  {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('wp_customer');
    }
}