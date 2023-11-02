<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeControllerCommand extends Command
{
    protected static $defaultName = 'make:controller';

    protected function configure()
    {
        $this
            ->setDescription('make controller file')
            ->setHelp('This command allows you to generate a new contoller file.')
            ->addArgument('filename', InputArgument::REQUIRED, 'the name of the controller to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '[*] Controller Created Successfully',
            '====================================',
            '',
        ]);
        return Command::SUCCESS;
    }
}