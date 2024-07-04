<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\AddPostSubscribersJob;

class AddPostSubscribers
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        AddPostSubscribersJob::dispatch($event->post);
    }
}
