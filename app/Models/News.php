<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'publish_date', 'likes', 'image', 'slug'];

    protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title) . '-' . Str::random(5);
        });
    }

    protected $casts = [
        'publish_date' => 'date',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
