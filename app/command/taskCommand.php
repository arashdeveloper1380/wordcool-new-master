<?php

namespace App\Command;

use Core\Scheduler\Scheduler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class taskCommand extends Command
{
    protected static $defaultName = 'run:task';

    protected function configure()
    {
        $this->setDescription('run task db')
            ->setHelp('This command run task db insert data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scheduler = new Scheduler();

        $scheduler->addTask('insert data', function(){
            db()->table('test')->insert(['name' => 'arash']);
        }, Scheduler::everyTwoSeconds);

        // $scheduler->hourlyAt('insert data', 17, function(){
        //     echo "haa vallah ha";
        // });

        $scheduler->run();
    }
}