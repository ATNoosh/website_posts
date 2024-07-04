<?php

namespace App\Console\Commands;

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
        SubscriptionPost::raw()->orderBy('id','asc')->chunck(1000, function($supPosts){
            
        });
    }
}
