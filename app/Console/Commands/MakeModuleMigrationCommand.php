<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModuleMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-migration {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration for a module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $module = $this->argument('module');
        $name   = $this->argument('name');

        $path = "modules/{$module}/Database/Migrations";

        $this->call('make:migration', [
            'name' => $name,
            '--path' => $path,
        ]);

        $this->info("Migration {$name} created in {$path}");
    }
}
