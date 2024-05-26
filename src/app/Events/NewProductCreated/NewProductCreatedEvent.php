<?php

namespace App\Events\NewProductCreated;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewProductCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected NewProductNotificationPayload $notificationPayload;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(NewProductNotificationPayload $productPayload)
    {
        $this->notificationPayload = $productPayload;
    }

    public function getNotificationPayload(): NewProductNotificationPayload
    {
        return $this->notificationPayload;
    }
}
