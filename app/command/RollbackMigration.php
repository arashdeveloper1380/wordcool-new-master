<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RollbackMigration extends Command
{
    protected static $defaultName = 'migration:rollback';

    protected function configure()
    {
        $this->setDescription('rollback migrate file')
            ->setHelp('This command rollback migrate file')
            ->addArgument('migrationName', InputArgument::REQUIRED, 'the name of the command to rollback');
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

            (new $table_class())->down();

            $output->writeln([
                "",
                "[*] ".$migrationName. " Migration rollback Successfully",
                '',
            ]);
        }else{
            $output->writeln([
                "",
                "[!] Migration file for {$migrationName} does not exist.",
                '',
            ]);
        }
        return Command::SUCCESS;
    }
}