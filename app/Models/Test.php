<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model{

    protected $table = "test";

    protected $fillable = ['name'];

    public $timestamps = false;
    
}