<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_version extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'created_at',
        'updated_at',
    ];
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function questions()
    {
        return $this->hasMany(FormQuestion::class);
    }

    /**
     * Automatically increment the version_number when creating a new Form_version.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($formVersion) {
            $latestVersion = self::where('form_id', $formVersion->form_id)
                ->max('version');

            $formVersion->version = $latestVersion ? $latestVersion + 1 : 1;
        });
    }
}
