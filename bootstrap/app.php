<?php

use App\Console\Commands\MakeModuleCommand;
use App\Console\Commands\MakeModuleMigrationCommand;
use App\Console\Commands\MigrateModuleCommand;
use App\Console\Commands\SyncModulesCommand;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withCommands([
            MakeModuleCommand::class, // Register your command here
            MakeModuleMigrationCommand::class,
            MigrateModuleCommand::class,
            SyncModulesCommand::class,
        ])
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
