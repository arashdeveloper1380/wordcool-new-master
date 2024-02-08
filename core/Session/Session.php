<?php

namespace Core\Session;

class Session{

    protected $sessionData = [];
    protected $flashData = [];

    public function __construct(){
        session_start();
        $this->loadSessionData();
        $this->loadFlashData();
    }

    public function put(string $key, string $value) : void{
        $_SESSION[$key] = $value;
        $this->sessionData[$key] = $value;
    }

    public function get(string $key, ?string $default = null) : string{
        return $this->sessionData[$key] ?? $default;
    }

    public function forget(string $key) : void{
        unset($_SESSION[$key]);
        unset($this->sessionData[$key]);
    }

    public function flash($key, $value){
        $this->put($key, $value);
        $this->sessionData[$key] = true;
    }

    public function has($key){
        return isset($this->sessionData[$key]);
    }

    public function all(){
        return $this->sessionData;
    }

    public function flashAll(){
        foreach ($this->sessionData as $sessionItem) {
            $this->forget($sessionItem);
        }
    }

    public function __get($key){
        return $this->get($key);
    }

    public function loadSessionData(){
        $this->sessionData = $_SESSION;
    }

    protected function loadFlashData(){
        foreach ($_SESSION as $key => $value) {
            if (isset($this->flashData[$key])) {
                $this->flashData[$key] = true;
            }
        }
    }

}