<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\SubscriptionPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddPostSubscribersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $post = $this->post;
        
        $this->post
            ->website
            ->subscribed_users()
            ->orderBy('users_subscriptions.id', 'asc')
            ->chunk(500, function ($users) use ($post) {
                foreach ($users as $user) {
                    SubscriptionPost::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                    ]);
                }
            });
    }
}
