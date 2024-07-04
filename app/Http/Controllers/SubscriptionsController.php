<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSubscribeToWebsite;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    public function store(UserSubscribeToWebsite $request)
    {
        $validated = $request->validated();
        $subscription = Subscription::create($validated);

        return response()->json($subscription);
    }
}
