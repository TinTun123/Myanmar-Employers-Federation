<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateStatementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'committee' => 'sometimes|required|string|max:255',
            'statement_no' => 'sometimes|required|string|max:800',
            'body' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'images' => 'nullable|array',
            'imagesURL' => 'nullable|array',
        ];
    }
}
