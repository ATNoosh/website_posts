<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\AddPostSubscribersJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
