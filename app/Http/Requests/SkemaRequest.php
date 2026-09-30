<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkemaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('skema')?->id;

        return [
            'kode_skema' => ['required', 'string', 'max:30', Rule::unique('skema', 'kode_skema')->ignore($id)],
            'nama_skema' => ['required', 'string', 'max:150'],
            'deskripsi' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_skema.required' => 'Kode skema wajib diisi.',
            'kode_skema.max' => 'Kode skema maksimal 30 karakter.',
            'kode_skema.unique' => 'Kode skema sudah digunakan.',
            'nama_skema.required' => 'Nama skema wajib diisi.',
            'nama_skema.max' => 'Nama skema maksimal 150 karakter.',
        ];
    }
}