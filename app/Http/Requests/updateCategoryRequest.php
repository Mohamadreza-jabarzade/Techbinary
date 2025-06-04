<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCategoryRequest extends FormRequest
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
            '_method' => 'nullable|string',
            '_token' => 'nullable|string',
            'category_id' => 'required|exists:categories,id|integer',
            'name' => 'required|max:255|string',
            'slug' => 'required|max:300|string|unique:categories,slug',
        ];
    }
}
