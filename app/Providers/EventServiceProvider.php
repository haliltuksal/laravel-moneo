<?php

namespace App\Providers;

use App\Events\CartTotalCalculated;
use App\Listeners\LogCartTotal;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        CartTotalCalculated::class => [
            LogCartTotal::class,
        ]
    ];

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
