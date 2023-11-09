<?php

namespace Core\Scheduler;

use Core\Scheduler\Task;

class Scheduler{

    public const everySecond            = 1;
    public const everyTwoSeconds        = 2;
    public const everyFiveSeconds       = 5; 
    public const everyTenSeconds        = 10;
    public const everyFifteenSeconds    = 15;
    public const everyTwentySeconds     = 20;
    public const everyThirtySeconds     = 30;
    public const everyMinute            = 60;
    public const everyTwoMinutes        = 12;
    public const everyThreeMinutes      = 180;
    public const everyFourMinutes       = 240;
    public const everyFiveMinutes       = 300;
    public const everyTenMinutes        = 600;
    public const everyFifteenMinutes    = 900;
    public const everyThirtyMinutes     = 1800;
    public const hourly                 = 3600;
    public const everyDay               = 86400;
    public const everyWeek              = 604800;

    private $tasks = [];

    public function addTask($name, $callback, $interval){
        $task = new Task($name, $callback, $interval);
        $this->tasks[] = $task;
    }

    public function hourlyAt($name, $second, $callback){
        $interval = self::hourly;
        $interval += $second;
        $this->addTask($name, $callback, $interval);
    }

    public function daily($name, $callback){
        $interval = self::everyDay;
        $this->addTask($name, $callback, $interval);
    }
    
    public function dailyAt($name, $hour, $minute, $callback){
        $interval = self::everyDay;
        $interval += ($hour * 60 * 60) + ($minute * 60);
        $this->addTask($name, $callback, $interval);
    }

    public function weekly($name, $dayOfWeek, $hour, $minute, $callback){
        $interval = self::everyWeek;
        $interval += ($dayOfWeek * 24 * 60 * 60) + ($hour * 60 * 60) + ($minute * 60);
        $this->addTask($name, $callback, $interval);
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