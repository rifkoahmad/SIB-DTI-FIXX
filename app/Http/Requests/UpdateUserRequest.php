<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    public function rules()
    {
        $userId = $this->route('id'); // Ambil ID user dari parameter rute

        return [
            'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'peran' => [
                'required',
                Rule::in(['admin', 'staff', 'pimpinan', 'dosen', 'mahasiswa']), // Daftar nilai valid
            ],
            'password' => 'nullable|min:6'
        ];
    }
}

