<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
    use HasFactory;

    const TYPE_TEXT = 'text';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_SELECT = 'select';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_FILE = 'file';

    protected $casts = [
        'data' => 'array',
    ];

    protected $fillable = [
        'question_text',
        'form_version_id',
        'type',
        'is_required',
        'is_prefixed',
        'data',
        'description',
    ];

    public function formVersion()
    {
        return $this->belongsTo(Form_version::class);
    }
}
