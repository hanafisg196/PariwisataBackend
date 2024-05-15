<?php

namespace App\Providers;

use App\Services\Impl\TripServiceImpl;
use App\Services\TripService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TripServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        TripService::class => TripServiceImpl::class
    ];

    public function provides(): array
    {
        return[
            
            TripService::class
        ];
    }

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
        //
    }
}
