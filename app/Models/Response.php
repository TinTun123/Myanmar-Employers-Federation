<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'form_version_id',
        'case_id',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formVersion()
    {
        return $this->belongsTo(Form_version::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
