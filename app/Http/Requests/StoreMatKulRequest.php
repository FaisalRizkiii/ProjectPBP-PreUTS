<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMatKulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role === 'dosen' && Auth::user()->dosen->kaprodi;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_mk' => 'required|string|unique:mata_kuliah',
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|int',
            'sks' => 'required|int',
            'kurikulum' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            'sifat' => 'required|string|in:wajib,pilihan'
        ];
    }
}
