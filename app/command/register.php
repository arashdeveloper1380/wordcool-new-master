<?php

// Register Commands

use App\Command\HelloCommand;
use App\Command\MakeControllerCommand;

$application->addCommands([
    new HelloCommand(),
    new MakeControllerCommand()
]);