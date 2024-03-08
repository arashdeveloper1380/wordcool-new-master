<?php

namespace Core\Command;

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
            ->addArgument('controllername', InputArgument::REQUIRED, 'the name of the controller to create')
            ->addArgument('path', InputArgument::OPTIONAL, 'The path to create the file', './');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $controllerName = $input->getArgument('controllername');
        $path = $input->getArgument('path');

        $filePath = __DIR__ . '/../http/controllers/' . $path . '/' . $controllerName . '.php';
        $stubPath = __DIR__ . '/stubs/Controller.stub';
        $fileContent = file_get_contents($stubPath);

        $fileContent = str_replace('{{className}}', $controllerName, $fileContent);

        // if(!empty($path)){
        //     $fileContent = str_replace('{{dir}}', $path, $fileContent);
        // }
        
        
        file_put_contents($filePath, $fileContent);

        $output->writeln([
            '',
            '[*] Controller Created Successfully',
            '====================================',
            'File Path: ' . realpath($filePath),
            '',
        ]);
        return Command::SUCCESS;
    }
}