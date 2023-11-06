<?php

namespace Core\Scheduler;

class Task {

    private $name;
    private $callback;
    public $interval;
    private $lastRunTime;

    public function __construct($name, $callback, $interval){
        $this->name = $name;
        $this->callback = $callback;
        $this->interval = $interval;
        $this->lastRunTime = time();
    }

    public function run(){
        echo "Running Task '{$this->name}' . " . PHP_EOL;
        call_user_func($this->callback);
        $this->lastRunTime = time();
    }

    public function getInterval(){
        return $this->interval;
    }

    public function getLastRunTime(){
        return $this->lastRunTime;
    }
}