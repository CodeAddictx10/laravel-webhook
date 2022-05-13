<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\WebhookServer\WebhookCall;

class RegisterEventHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        logger($event->user);
        WebhookCall::create()
        ->url('http://127.0.0.1:4000')
        ->useSecret(env('WEBHOOK_SECRET_KEY'))
        ->payload(["user"=>$event->user])
        ->dispatch();
    }
}
