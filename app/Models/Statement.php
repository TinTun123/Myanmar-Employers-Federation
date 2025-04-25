<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'committee',
        'statement_no',
        'body',
        'date',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
        'date' => 'date',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
