<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $mahasiswaId = $this->route('id');
        return [
            'prodi_id' => 'required|exists:prodis,id',
            'nama' => 'required|string|max:255',
            'nim' => [
                'required',
                'string',
                'min:10',
                'max:12',
                Rule::unique('mahasiswas', 'nim')->ignore($mahasiswaId),
            ],
            'angkatan' => 'required|integer|digits:4',
            'ipk' => 'required|numeric|min:0|max:4',
        ];
    }
}
