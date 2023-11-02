<?php

// Register Commands

use App\Command\HelloCommand;
use App\Command\MakeCommandCommand;
use App\Command\MakeControllerCommand;
use App\Command\MakeModelCommand;

$application->addCommands([
    new HelloCommand(),
    new MakeControllerCommand(),
    new MakeModelCommand(),
    new MakeCommandCommand(),
]);