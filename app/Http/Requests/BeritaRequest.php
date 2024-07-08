<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            'kategori_beritas_id' => 'required',
            'judul' => 'required',
            'catatan' => 'required',
            'gambar' => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'tanggal_publikasi' => 'required'
        ];
    }
}
