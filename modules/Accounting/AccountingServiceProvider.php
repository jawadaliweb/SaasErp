<?php

namespace Modules\Accounting;

use Illuminate\Support\ServiceProvider;

class AccountingServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Load routes
        if (file_exists(__DIR__.'/routes.php')) {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        // Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'accounting');
    }
}