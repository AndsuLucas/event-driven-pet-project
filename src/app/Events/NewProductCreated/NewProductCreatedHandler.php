<?php

namespace App\Events\NewProductCreated;

use App\Mail\NewProduct;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewProductCreatedHandler implements  ShouldQueue
{
    use InteractsWithQueue;

    public $connection = 'rabbitmq';

    public $queue = 'new.product.notify';

    public bool $afterCommit = true;

    public function handle(NewProductCreatedEvent $event): void
    {
        /** @var Builder $user */
        $user = new User();

        $newProductPayload = $event->getNotificationPayload();

        // gerFromCache or NOSQL
        $recipitents = $user->select('email')
            ->get()
            ->toArray();

        foreach ($recipitents as $recipitent) {
            try {
                Mail::to($recipitent['email'])
                    ->send(new NewProduct($newProductPayload));
            } catch (\Exception $e) {
                // add a log/error handler
                // check if have chance to Unacknowledge the message
            }
        }
    }
}
