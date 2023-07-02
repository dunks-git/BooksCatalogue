<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user ? $user->role === 'admin' : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'integer|min:1',
            'author' => 'string',
            'title' => 'string',
            'genre' => 'string',
            'price' => 'decimal:0,2',
            'publish_date' => 'date|before:tomorrow',
            'description' => 'string',
        ];
    }
}
