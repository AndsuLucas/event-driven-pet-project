<?php

namespace App\Mail;

use App\Events\NewProductCreated\NewProductNotificationPayload;
use Illuminate\Mail\Mailable;

class NewProduct extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected readonly NewProductNotificationPayload $payload)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.new-product')
            ->with($this->payload->toEmail());
    }
}
