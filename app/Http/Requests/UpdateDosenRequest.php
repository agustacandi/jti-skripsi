<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDosenRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'string|unique:dosens|email:rfc,dns|max:100',
            'nip' => 'string|unique:dosens|max:20',
            'phone_number' => 'string|unique:dosens|max:20',
            'address' => 'required|string',
            'avatar' => 'image:png,jpg,jpeg|max:2048',
            'password' => 'string|min:8|confirmed'
        ];
    }
}
