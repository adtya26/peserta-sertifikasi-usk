<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Pakai tampilan pagination buatan sendiri (resources/views/pagination/custom.blade.php)
        Paginator::defaultView('pagination.custom');
    }
}