<?php

namespace App\Http\Middlewares;

class AuthMiddleware {

    public function handle(){
        if(1 === 1){
            return true;
        }
        $this->shouldAbort();
        
    }

    public function shouldAbort(){
        header('Location: https://google.com');
        die();
    }

}