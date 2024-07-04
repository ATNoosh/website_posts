<?php

namespace Database\Factories;

use App\Console\Commands\MailStatuses;
use App\Models\Post;
use App\Models\SubscriptionPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionPost>
 */
class SubscriptionPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $postID = Post::inRandomOrder()->first()?->id;
        $userID = User::inRandomOrder()->first()?->id;
        if (!SubscriptionPost::where('user_id', $userID)->where('post_id', $postID)->exists())
            return [
                'post_id' => $postID,
                'user_id' => $userID,
                'status' => fake()->randomElement(MailStatuses::toArray()),
            ];
        return [];
    }
}
