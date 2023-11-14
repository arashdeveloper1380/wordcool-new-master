<?php

namespace App\Http\Middlewares;

class AuthMiddleware {

    public function handle(){
        if(1 === 1){
            return true;
        }
        else{
            $this->shouldAbort();
        }
    }

    public function shouldAbort(){
        header('location:/');
    }

}