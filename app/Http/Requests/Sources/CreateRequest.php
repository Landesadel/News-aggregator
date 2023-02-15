<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'Categories_id' => 'array|required',
            'Categories_id.*' => 'exists:categories,id',
            'name' => 'required|string',
            'url' => 'required|url',
        ];
    }

    public function getCategoriesId(): array
    {
        return (array) $this->validated('Categories_id');
    }
}
