<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
class OrderStoredEvent
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public mixed $phone;
    public mixed $message;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->message = $data['message'];
        $this->phone = $data['phone'];
    }

}
