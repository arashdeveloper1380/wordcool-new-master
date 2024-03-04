<?php

namespace App\Http\PostType;

use PostTypes\PostType;

Class BookPostType {

    public function handle() : void{
        $books = new PostType('book');
        $books->register();
    }

}