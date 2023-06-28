<?php

namespace App\Http\Requests\Web\Book;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'integer|min:0',
            'author' => 'string',
            'title' => 'string',
            'price' => 'decimal:0,2',
            'publish_year' => 'integer',
            'description' => 'string',
            'genre_id' => 'integer|min:1',
        ];
    }
}
