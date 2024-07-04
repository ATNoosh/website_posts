<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website_address'];

    public function posts():HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function subscribed_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_subscriptions');
    }
}
