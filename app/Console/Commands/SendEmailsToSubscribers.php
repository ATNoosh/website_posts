<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\SubscriptionPost;
use Illuminate\Console\Command;

class SendEmailsToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SubscriptionPost::raw()->orderBy('id', 'asc')
            ->chunk(env('EMAIL_CHUNK_SIZE', 1000), function ($subPosts) {
                foreach ($subPosts as $subPost) {
                    SendEmailJob::dispatch($subPost);
                    SubscriptionPost::find($subPost->id)->update(['status' => 'queued']);
                }
            });
    }
}
