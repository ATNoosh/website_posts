<?php

namespace Database\Seeders;

use App\Models\SubscriptionPost;
use Illuminate\Database\Seeder;

class SubscriptionPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPost::factory()->count(1000)->create();
    }
}
