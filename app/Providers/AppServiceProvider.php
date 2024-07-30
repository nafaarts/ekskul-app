<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('is-admin', function (User $user) {
            return $user->hak_akses == 'ADMIN';
        });

        Gate::define('is-ekstrakurikuler', function (User $user) {
            return $user->hak_akses == 'EKSTRAKURIKULER';
        });
    }
}
