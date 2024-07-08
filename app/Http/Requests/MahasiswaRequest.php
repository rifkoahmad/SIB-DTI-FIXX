<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
        $mahasiswaId = $this->route('mahasiswa'); // atau $this->mahasiswa jika data mahasiswa di-bind pada route

        return [
            'prodi_id' => 'required|exists:prodis,id',
            'users_id' => 'required',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|min:10|max:12|unique:mahasiswas,nim,' . $mahasiswaId,
            'angkatan' => 'required|integer|digits:4',
            'ipk' => 'required|numeric|min:0|max:4'
        ];
    }
}
