<?php

namespace Core\Command;

use Database\Seeders\DatabaseSeeder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunSeeder extends Command
{
    protected static $defaultName = 'db:seed';

    protected function configure(){
        $this->setDescription('Run Sedder you need ')
            ->setHelp('This command say hello');

    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $databaseSedder = new DatabaseSeeder();
        if(is_object($databaseSedder)){
            $databaseSedder->run();
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