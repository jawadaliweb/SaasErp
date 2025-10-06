<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModuleCommand extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Create a new module structure with Livewire component, route, and view';

    public function handle()
    {
        $name       = Str::studly($this->argument('name'));
        $lowerName  = strtolower($name);
        $modulePath = base_path("modules/{$name}");

        if (File::exists($modulePath)) {
            $this->error("❌ Module {$name} already exists!");
            return 1;
        }

        // Create folders
        $folders = [
            "Http/Livewire",
            "Models",
            "Services",
            "Database/Migrations",
            "Database/Seeders",
            "Resources/views",
        ];

        foreach ($folders as $folder) {
            File::makeDirectory("{$modulePath}/{$folder}", 0755, true);
        }

        /**
         * Service Provider
         */
        $providerContent = <<<PHP
        <?php

        namespace Modules\\{$name};

        use Illuminate\Support\ServiceProvider;

        class {$name}ServiceProvider extends ServiceProvider
        {
            public function register()
            {
                //
            }

            public function boot()
            {
                // Load routes
                if (file_exists(__DIR__.'/routes.php')) {
                    \$this->loadRoutesFrom(__DIR__.'/routes.php');
                }

                // Load migrations
                \$this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

                // Load views
                \$this->loadViewsFrom(__DIR__.'/Resources/views', '{$lowerName}');
            }
        }
        PHP;

        File::put("{$modulePath}/{$name}ServiceProvider.php", $providerContent);

        /**
         * Livewire Component
         */
        $componentClassContent = <<<PHP
        <?php

        namespace Modules\\{$name}\Http\Livewire;

        use Livewire\Component;

        class Welcome extends Component
        {
            public \$user;

            public function mount()
            {
                \$this->user = auth()->user(); // works with web+auth middleware
            }

            public function render()
            {
                return view('{$lowerName}::welcome');
            }
        }
        PHP;

        File::put("{$modulePath}/Http/Livewire/Welcome.php", $componentClassContent);

        /**
         * Route
         */
        $routeContent = <<<PHP
        <?php

        use Illuminate\\Support\\Facades\\Route;
        use Modules\\{$name}\\Http\\Livewire\\Welcome;

        Route::middleware(['web', 'auth'])->group(function () {
            Route::get('/{$lowerName}', Welcome::class)->name('{$lowerName}.index');
        });
        PHP;

        File::put("{$modulePath}/routes.php", $routeContent);

        /**
         * View
         */
        $viewContent = <<<HTML
        <div>
            <h1 class="text-3xl font-bold mb-4">Welcome to {$name} Module 🎉</h1>

            @if(\$user)
                <p>Hello, <strong>{{ \$user->name }}</strong>! Your account was created on <strong>{{ \$user->created_at->format('d M Y') }}</strong>.</p>
            @else
                <p>Hello, Guest! Please login to access full features.</p>
            @endif

            <p>This is a default Livewire welcome component in <code>modules/{$name}/Resources/views/welcome.blade.php</code></p>
        </div>
        HTML;

        File::put("{$modulePath}/Resources/views/welcome.blade.php", $viewContent);

        /**
         * Composer.json
         */
        $composerContent = <<<JSON
        {
            "name": "modules/{$name}",
            "description": "{$name} module for Laravel",
            "autoload": {
                "psr-4": {
                    "Modules\\\\{$name}\\\\": ""
                }
            }
        }
        JSON;

        File::put("{$modulePath}/composer.json", $composerContent);

        /**
         * Insert into DB
         */
        DB::table('modules')->insert([
            'name'        => $name,
            'description' => "{$name} module",
            'enabled'     => true,
            'path'        => "modules/{$name}",
            'installed_at'=> now(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        $this->info("✅ Module {$name} created successfully with Livewire component, route, and view!");
        return 0;
    }
}
