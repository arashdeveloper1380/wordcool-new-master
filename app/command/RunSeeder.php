<?php

namespace App\Command;

use Database\Seeders\DatabaseSeeder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunSeeder extends Command
{
    protected static $defaultName = 'run:seeder';

    protected function configure()
    {
        $this->setDescription('Run Sedder you need ')
            ->setHelp('This command say hello')
            ->addArgument('seederName', InputArgument::REQUIRED, 'the name of the command to Seed Data');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $class = $input->getArgument('migrationName');
        $namespace = '\Database\Seeders\\' . $class;
        if(class_exists($namespace)){
            $obj = new $namespace();
            $obj->run();
            $output->writeln([
                "",
                "[*]Seed Data Successfully",
                '',
            ]);
            return Command::SUCCESS;
        }else{
            $output->writeln("Running Feaild");
            return Command::FAILURE; 
        }
    }
}