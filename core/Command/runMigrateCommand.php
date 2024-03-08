<?php

namespace Core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class runMigrateCommand extends Command
{
    protected static $defaultName = 'migration:run';

    protected function configure()
    {
        $this->setDescription('Run Migration File')
            ->setHelp('This command Run Migration File')
            ->addArgument('migrationName', InputArgument::REQUIRED, 'the name of the command to run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $migrationName = $input->getArgument('migrationName');
        $table_name = "create_{$migrationName}_table";
        $table_name_exist = BASE . '/database/migrations/' . $table_name . '.php';
        if(file_exists($table_name_exist)){
            $table_class = ucfirst($migrationName);
            $table_class = "Create{$table_class}Table";
            include $table_name_exist;

            (new $table_class())->up();

            $output->writeln([
                "",
                "[*] ".$migrationName. " Migrated Successfully",
                '',
            ]);
        }else {
            $output->writeln([
                "",
                "[!] Migration file for {$migrationName} does not exist.",
                '',
            ]);
        }

        return Command::SUCCESS;
    }
}