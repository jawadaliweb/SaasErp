<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:module {module} {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate a specific module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
              $module = $this->argument('module');
        $path   = "modules/{$module}/Database/Migrations";

        if (! is_dir(base_path($path))) {
            $this->error("Module {$module} does not have a Database/Migrations folder.");
            return;
        }

        $options = [];

        if ($this->option('fresh')) {
            $this->call('migrate:fresh', [
                '--path' => $path,
                '--seed' => $this->option('seed'),
            ]);
        } else {
            $this->call('migrate', [
                '--path' => $path,
            ]);

            if ($this->option('seed')) {
                $this->call('db:seed', [
                    '--class' => "Modules\\{$module}\\Database\\Seeders\\{$module}DatabaseSeeder",
                ]);
            }
        }

        $this->info("Migrations for {$module} module executed successfully.");
    }
}
