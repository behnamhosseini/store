<?php

namespace App\Listeners;

use App\Events\OrderStoredEvent;
use App\Service\SendSmsUseCase;
use App\Service\SmsProvider\smsProviderInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderStoredSendSmsListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(public SendSmsUseCase $sendSmsUseCase)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStoredEvent $event): void
    {
        $this->sendSmsUseCase->execute($event->phone,$event->message);
    }
}
