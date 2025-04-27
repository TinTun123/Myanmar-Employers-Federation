<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Form extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'description',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // Field to generate the slug from
            ->saveSlugsTo('slug');      // Field to save the slug to
    }

    public function formVersions()
    {
        return $this->hasMany(Form_version::class);
    }

    public function latestFormVersion()
    {
        return $this->hasOne(Form_version::class)->latestOfMany(); // Laravel 8+ helper
    }
}
