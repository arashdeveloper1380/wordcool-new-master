<?php

namespace App\Http\PostType;

use PostTypes\PostType;

Class BookPostType {

    public function handle(){
        $books = new PostType('book');
        $books->register();
    }

}