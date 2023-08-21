<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeForPost($query, Post $post)
    {
        return $query->where('post_id', $post->id);
    }

    public function scopeForIp($query, string $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeForUserAgent($query, string $userAgent)
    {
        return $query->where('user_agent', $userAgent);
    }
}
