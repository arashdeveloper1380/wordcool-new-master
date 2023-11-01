<?php

require BASE_PATH . 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected static $defaultName = 'hello';

    protected function configure()
    {
        $this->setDescription('Greet the user')
            ->setHelp('This command greets the user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello, World!');
        return Command::SUCCESS;
    }
}

$application = new Application();
$application->add(new GreetCommand());
$application->run();