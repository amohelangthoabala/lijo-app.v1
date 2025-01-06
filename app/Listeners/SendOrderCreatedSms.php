<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Services\TwilioService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderCreatedSms
{

    protected $twilio;

    /**
     * Create the event listener.
     */
    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $customerPhone = $order->customer->phone; // Assuming your order model is linked to a customer
        $message = "Hello {$order->customer->name}, your order #{$order->id} has been created successfully!";

        $this->twilio->sendSms($customerPhone, $message);
    }
}
