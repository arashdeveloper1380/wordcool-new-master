<?php

// Register Commands

use App\Command\HelloCommand;
use App\Command\MakeCommandCommand;
use App\Command\MakeControllerCommand;
use App\Command\MakeModelCommand;
use App\Command\taskCommand;
use App\Command\runMigrateCommand;

$application->addCommands([
    new HelloCommand(),
    new MakeControllerCommand(),
    new MakeModelCommand(),
    new MakeCommandCommand(),
    new taskCommand(),
    new runMigrateCommand()
]);