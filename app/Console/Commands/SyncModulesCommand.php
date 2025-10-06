<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SyncModulesCommand extends Command
{
    protected $signature = 'modules:sync';
    protected $description = 'Sync modules between database and filesystem (remove missing ones)';

    public function handle()
    {
        $this->info("🔄 Syncing modules...");

        // Get modules from DB
        $dbModules = DB::table('modules')->get();

     foreach ($dbModules as $module) {
    $path = base_path($module->path);

    if (! File::exists($path)) {
        DB::table('modules')->where('id', $module->id)->delete();
        $this->warn("❌ Removed '{$module->name}' (missing folder: {$module->path})");
        continue; // skip loading any class
    }

    $providerClass = "Modules\\{$module->name}\\{$module->name}ServiceProvider";
    if (class_exists($providerClass)) {
        // optional: do something with provider
    }
}


        $this->info("✅ Sync completed!");
        return 0;
    }
}
