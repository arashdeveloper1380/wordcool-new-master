<?php

namespace Core\Scheduler;

use Core\Scheduler\Task;

class Scheduler{

    private $tasks = [];

    public function addTask($name, $callback, $interval){
        $task = new Task($name, $callback, $interval);
        $this->tasks[] = $task;
    }

    public function run(){
        $startTime = time();
        while (true){
            $currentTime = time();
            foreach($this->tasks as $task){
                $interval = $task->getInterval();
                $lastRunTime = $task->getLastRunTime();
                if(($currentTime - $lastRunTime) >= $interval){
                    $task->run();
                }
            }
            $elapsedTime = time() - $startTime;
            $remainingTime = $interval - $elapsedTime;
            if($remainingTime > 0){
                sleep($remainingTime);
            }
        }
    }

    public function shouldRunTask($task, $interval){
        $lastRunTime = $task->getLastRunTime();
        $currentTime = time();
        return ($currentTime - $lastRunTime) >= $interval;
    }

}