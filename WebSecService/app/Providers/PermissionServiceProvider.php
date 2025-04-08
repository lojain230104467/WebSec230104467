<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register @role directive
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        // Register @endrole directive
        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

        // Register @hasrole directive
        Blade::directive('hasrole', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        // Register @endhasrole directive
        Blade::directive('endhasrole', function () {
            return "<?php endif; ?>";
        });
    }
}
