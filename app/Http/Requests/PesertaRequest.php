<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PesertaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('peserta')?->id;

        return [
            'nik' => ['required', 'digits:16', Rule::unique('peserta', 'nik')->ignore($id)],
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'no_hp' => ['required', 'regex:/^[0-9+]{9,20}$/'],
            'alamat' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'skema_id' => ['required', 'exists:skema,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.required' => 'No. HP wajib diisi.',
            'no_hp.regex' => 'No. HP tidak valid (9-20 digit angka).',
            'alamat.required' => 'Alamat wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_id.exists' => 'Skema yang dipilih tidak valid.',
        ];
    }
}