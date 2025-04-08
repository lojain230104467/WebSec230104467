<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Implicitly grant "Admin" role all permissions
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin')) {
                return true;
            }
        });

        // Define gates for each permission
        Gate::define('add_products', function (User $user) {
            return $user->hasPermissionTo('add_products');
        });

        Gate::define('edit_products', function (User $user) {
            return $user->hasPermissionTo('edit_products');
        });

        Gate::define('delete_products', function (User $user) {
            return $user->hasPermissionTo('delete_products');
        });

        Gate::define('manage_customers', function (User $user) {
            return $user->hasPermissionTo('manage_customers');
        });

        Gate::define('show_users', function (User $user) {
            return $user->hasPermissionTo('show_users');
        });

        Gate::define('edit_users', function (User $user) {
            return $user->hasPermissionTo('edit_users');
        });

        Gate::define('delete_users', function (User $user) {
            return $user->hasPermissionTo('delete_users');
        });

        Gate::define('admin_users', function (User $user) {
            return $user->hasPermissionTo('admin_users');
        });
    }
} 