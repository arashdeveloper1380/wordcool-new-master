<?php

// Register Commands

use App\Command\HelloCommand;
use App\Command\MakeCommandCommand;
use App\Command\MakeControllerCommand;
use App\Command\MakeModelCommand;
use App\Command\taskCommand;
use App\Command\runMigrateCommand;
use App\Command\RollbackMigration;

$application->addCommands([
    new HelloCommand(),
    new MakeControllerCommand(),
    new MakeModelCommand(),
    new MakeCommandCommand(),
    new taskCommand(),
    new runMigrateCommand(),
    new RollbackMigration()
]);