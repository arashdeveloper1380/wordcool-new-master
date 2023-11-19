<?php

namespace App\Http\Middlewares;

class AuthMiddleware {

    public function handle(){
        if(1 === 1){
            return true;
        }else{
            echo "permission Denied";
        }
    }

}