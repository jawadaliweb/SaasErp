<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $enabledModules = DB::table('modules')->where('enabled', true)->pluck('name');

        foreach ($enabledModules as $moduleName) {
            $modulePath = base_path("modules/{$moduleName}/{$moduleName}ServiceProvider.php");

            if (File::exists($modulePath)) {
                $providerClass = "Modules\\{$moduleName}\\{$moduleName}ServiceProvider";

                if (class_exists($providerClass)) {
                    $this->app->register($providerClass);
                }
            } else {
                // Optionally remove it from DB automatically
                DB::table('modules')->where('name', $moduleName)->delete();
                Log::warning("Module {$moduleName} removed from DB because folder is missing");
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
