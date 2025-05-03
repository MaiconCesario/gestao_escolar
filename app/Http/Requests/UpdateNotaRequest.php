<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nota1' => 'nullable|numeric|min:0|max:10',
            'nota2' => 'nullable|numeric|min:0|max:10',
            'nota3' => 'nullable|numeric|min:0|max:10',
            'nota4' => 'nullable|numeric|min:0|max:10',
        ];
    }
}
