<?php

// Register Commands

use App\Command\BackupCommand;
use App\Command\HelloCommand;
use Core\Command\MakeCommandCommand;
use Core\Command\MakeControllerCommand;
use Core\Command\MakeModelCommand;
use App\Command\taskCommand;
use Core\Command\runMigrateCommand;
use Core\Command\RollbackMigration;
use Core\Command\RunSeeder;

$application->addCommands([
    new HelloCommand(),
    new MakeControllerCommand(),
    new MakeModelCommand(),
    new MakeCommandCommand(),
    new taskCommand(),
    new runMigrateCommand(),
    new RollbackMigration(),
    new RunSeeder(),
]);