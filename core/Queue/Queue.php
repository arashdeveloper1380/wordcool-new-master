<?php

// Job interface
interface JobInterface {
    public function handle();
}

// Abstract Job class
abstract class Job implements JobInterface {
    // Implement common logic for jobs
    // Jobs will implement the handle method
}

// A sample Job
class SomeJob extends Job {
    public function handle() {
        // Task logic goes here
        echo "Job is being processed...\n ";
    }
}

// Queue class
class Queue {
    protected $jobs = [];

    public function push(Job $job) {
        $this->jobs[] = $job;
    }

    public function pop() {
        if (!$this->isEmpty()) {
            return array_shift($this->jobs);
        }
        return null;
    }

    public function isEmpty() {
        return empty($this->jobs);
    }
}

// Dispatcher class
class Dispatcher {
    protected $queue;

    public function __construct(Queue $queue) {
        $this->queue = $queue;
    }

    public function dispatch() {
        while (!$this->queue->isEmpty()) {
            $job = $this->queue->pop();
            $job->handle();
        }
    }
}

// Usage
$queue = new Queue();
$dispatcher = new Dispatcher($queue);

$job1 = new SomeJob();
$job2 = new SomeJob();

$queue->push($job1);
$queue->push($job2);

$dispatcher->dispatch();




class JobFactory {
    public static function create($jobClass, $parameters = []) {
        if (!class_exists($jobClass)) {
            throw new Exception("Job class $jobClass does not exist.");
        }
        return new $jobClass(...$parameters);
    }
}






function dispatch(Job $job) {
    global $dispatcher; // فرض می‌کنیم که شی Dispatcher در دسترس است.
    $dispatcher->dispatch($job);
}

function pushToQueue(Job $job) {
    global $queue; // فرض می‌کنیم که شی Queue در دسترس است.
    $queue->push($job);
}





require_once 'JobFactory.php';
require_once 'Helpers.php';

// دیگر کد های پیاده سازی Job, Queue و Dispatcher از نمونه کد قبلی می‌باشد.

// به کار گیری Factory و Helpers
try {
    $someJob = JobFactory::create(SomeJob::class);
    pushToQueue($someJob);
    dispatch($someJob);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}