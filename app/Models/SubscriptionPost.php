<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionPost extends Model
{
    use HasFactory;

    protected $table = 'subscribers_posts';

    protected $fillable = ['post_id', 'user_id', 'status'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRaw(Builder $query): void
    {
        $query->where('status', 'raw');
    }

    public function scopeQueued(Builder $query): void
    {
        $query->where('status', 'queued');
    }

    public function scopeSent(Builder $query): void
    {
        $query->where('status', 'sent');
    }
}
