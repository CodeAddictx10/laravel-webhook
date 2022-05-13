<?php

namespace App\Providers;

use App\Events\NewUserEvent;
use App\Listeners\RegisterEventHandler;
use Spatie\WebhookServer\Events\WebhookCallSucceededEvent;
use Spatie\WebhookServer\Events\FinalWebhookCallFailedEvent;
use App\Listeners\WebhookCallSucceededEventHandler;
use App\Listeners\FinalWebhookCallSucceededEventHandler;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        NewUserEvent::class => [
            RegisterEventHandler::class,
        ],
        WebhookCallSucceededEvent::class => [
            WebhookCallSucceededEventHandler::class,
        ],
        FinalWebhookCallFailedEvent::class => [
            FinalWebhookCallSucceededEventHandler::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
