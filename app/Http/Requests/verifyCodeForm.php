<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class verifyCodeForm extends FormRequest
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
            'code1' => 'required|min:1|max:1',
            'code2' => 'required|min:1|max:1',
            'code3' => 'required|min:1|max:1',
            'code4' => 'required|min:1|max:1',
            'code5' => 'required|min:1|max:1',
            'code6' => 'required|min:1|max:1',
        ];
    }
}
