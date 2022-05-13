<?php

namespace App\Listeners;

use App\Models\User;
use \Spatie\WebhookServer\Events\WebhookCallSucceededEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebhookCallSucceededEventHandler
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
     * @param WebhookCallSucceededEvent  $event
     * @return void
     */
    public function handle(WebhookCallSucceededEvent $event)
    {
        $payload = $event->payload["user"];
        /**
         * update user's record if webhook is successfull
         */
        $user = User::find($payload->id);
        $user->webhook_status = true;
        $user->save();
        return true;
    }
}
