<?php

namespace App\Command;

require_once BASE  . '/config/database.php';

use Corcel\Model\Post;
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
        }, 5);

        $scheduler->run();
    }
}