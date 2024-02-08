<?php

namespace Core\Redirect;

use Core\Redirect\Contracts\RedirectInterface;
use Core\Session\Session;

class Redirect implements RedirectInterface{

    public function url($url){
        header("Location: " . home_url() . "/{$url}");
        exit;
        return $this;
    }

    public function with(string $key, $data){
        session()->put($key, $data);
        return $this;
    }

    public function back(){
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
            return $this;
        }
    }

}