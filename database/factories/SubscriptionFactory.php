<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        for ($i = 0; $i < 100; $i++) {
            $websiteID = Website::inRandomOrder()->first()?->id;
            $userID = User::inRandomOrder()->first()?->id;
            if (!Subscription::where('user_id', $userID)->where('website_id', $websiteID)->exists())
                return [
                    'website_id' => $websiteID,
                    'user_id' => $userID,
                ];
        }
        return [];
    }
}
