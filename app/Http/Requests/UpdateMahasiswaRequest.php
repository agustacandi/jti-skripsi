<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
            'name' => 'string|max:255',
            'angkatan' => 'string',
            'program_studi_id' => 'string',
            'gender' => 'string',
            'address' => 'string',
            'avatar' => 'image:png,jpg,jpeg|max:2048',
            'password' => 'string|min:8|confirmed'
        ];
    }
}