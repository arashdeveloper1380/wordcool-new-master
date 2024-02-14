<?php

namespace App\Command;

use Database\Seedders\DatabaseSeeder;
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
            ->setHelp('This command say hello');
            // ->addArgument('seederName', InputArgument::REQUIRED, 'the name of the command to run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $seederName = $input->getArgument('seederName');
        $databaseSeeder = BASE . '/database/seeders/DatabaseSeeder.php';
        if(file_exists($databaseSeeder)){
            require($databaseSeeder);
            $obj = new DatabaseSeeder();
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