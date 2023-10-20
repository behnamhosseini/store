<?php

namespace App\Providers;

use App\Service\SmsProvider\ServiceA;
use App\Service\SmsProvider\ServiceB;
use App\Service\SmsProvider\ServiceC;
use App\Service\SmsProvider\smsProviderInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(smsProviderInterface::class, function ($app) {
            return [
                $app->make(ServiceA::class),
                $app->make(ServiceB::class),
                $app->make(ServiceC::class),
            ];
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
