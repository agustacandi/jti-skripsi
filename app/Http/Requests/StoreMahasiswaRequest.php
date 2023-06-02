<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
            // 'email' => 'required|string|unique:users|email:rfc,dns|max:100',
            'email' => 'required|string',
            'nim' => 'required|string|unique:users|max:9',
            'phone_number' => 'required|string|unique:users|max:20',
            'angkatan' => 'required|string',
            'program_studi_id' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'image:png,jpg,jpeg|max:2048',
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}