<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModelCommand extends Command
{
    protected static $defaultName = 'make:model';

    protected function configure()
    {
        $this
            ->setDescription('make model file')
            ->setHelp('This command allows you to generate a new model file.')
            ->addArgument('modelname', InputArgument::REQUIRED, 'the name of the model to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $modelName = $input->getArgument('modelname');

        $filePath = __DIR__ . '/../models/'. $modelName . '.php';
        $stubPath = __DIR__ . '/stubs/Model.stub';
        $fileContent = file_get_contents($stubPath);

        $fileContent = str_replace('{{Model}}', $modelName, $fileContent);

        // if(!empty($path)){
        //     $fileContent = str_replace('{{dir}}', $path, $fileContent);
        // }
        
        
        file_put_contents($filePath, $fileContent);

        $output->writeln([
            '',
            '[*] Model Created Successfully',
            '====================================',
            'File Path: ' . realpath($filePath),
            '',
        ]);
        return Command::SUCCESS;
    }
}