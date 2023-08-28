<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Post extends Model implements Auditable
{
    use HasFactory;
    use HasUlids;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];

    protected $withCount = [
        'likes',
    ];

    public function excerpt()
    {
        return Str::words($this->contents, 50);
    }

    public function datePostPublished()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    public function datePostFormat()
    {
        return Carbon::parse($this->published_at)->toFormattedDateString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function isLiked(): bool
    {
        if (auth()->user()) {
            // Check if there's a like from the authenticated user
            return $this->likes()->where('user_id', auth()->id())->exists();
        } else {
            // Check if there's a like from the current IP address and user agent
            $ip = request()->ip();
            $userAgent = request()->userAgent();
            return $this->likes()->where('ip', $ip)->where('user_agent', $userAgent)->exists();
        }
    }

    public function removeLike(): void
    {
        if (auth()->user()) {
            // Remove the like from the authenticated user
            $this->likes()->where('user_id', auth()->id())->delete();
        } else {
            // Remove the like from the current IP address and user agent
            $ip = request()->ip();
            $userAgent = request()->userAgent();
            $this->likes()->where('ip', $ip)->where('user_agent', $userAgent)->delete();
        }
    }

    protected static function booted()
    {
        // We will automatically add the user to the post when it's saved.
        static::creating(function ($post) {
            if (auth()->user()) {
                $post->user_id = auth()->id();
            }
        });
    }
}
