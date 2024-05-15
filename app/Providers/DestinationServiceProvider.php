<?php

namespace App\Providers;

use App\Services\DestinationService;
use App\Services\Impl\DestinationServiceImpl;
use Illuminate\Support\ServiceProvider;

class DestinationServiceProvider extends ServiceProvider
{
    public array $singletons = [
        DestinationService::class => DestinationServiceImpl::class
    ];

    public function provides(): array
    {
        return  [
            DestinationService::class
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
