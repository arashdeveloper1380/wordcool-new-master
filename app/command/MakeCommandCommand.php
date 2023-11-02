<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommandCommand extends Command
{
    protected static $defaultName = 'make:command';

    protected function configure()
    {
        $this
            ->setDescription('make command file')
            ->setHelp('This command allows you to generate a new command file.')
            ->addArgument('commandname', InputArgument::REQUIRED, 'the name of the command to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandName = $input->getArgument('commandname');

        $filePath = __DIR__ . '/' . $commandName . '.php';
        $stubPath = __DIR__ . '/stubs/Command.stub';
        $fileContent = file_get_contents($stubPath);

        $fileContent = str_replace('{{Command}}', $commandName, $fileContent);
        
        file_put_contents($filePath, $fileContent);

        $output->writeln([
            '',
            '[*] Command Created Successfully',
            '====================================',
            'File Path: ' . realpath($filePath),
            '',
        ]);
        return Command::SUCCESS;
    }
}