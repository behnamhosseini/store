<?php

namespace App\Providers;

use App\Events\OrderStoredEvent;
use App\Listeners\OrderStoredSendSmsListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{


    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(
            OrderStoredEvent::class,
            [OrderStoredSendSmsListener::class, 'handle']
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
