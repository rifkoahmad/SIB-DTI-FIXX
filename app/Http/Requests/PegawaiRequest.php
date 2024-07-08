<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PegawaiRequest extends FormRequest
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
            'nama' => 'required',
            'users_id' => 'required',
            'nip_nik' => 'required',
            'jabatan_akademik' => 'required',
            'no_telepon' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('pegawais', 'email')->ignore($this->user ? $this->user->id : null),
            ],
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2024',
        ];
    }
}
