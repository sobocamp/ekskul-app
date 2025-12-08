<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan melakukan request ini.
     *
     * Secara default, request ini digunakan untuk memperbarui profil
     * user yang sedang login. Jika diperlukan, otorisasi tambahan
     * bisa diterapkan melalui policy atau gate.
     *
     * @return bool  True jika request diperbolehkan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk memperbarui data profil pengguna.
     *
     * Aturan validasi meliputi:
     * - **name**: wajib diisi, bertipe string, maksimal 255 karakter.
     * - **email**:
     *      - wajib diisi, bertipe string, format email valid.
     *      - maksimal 255 karakter.
     *      - otomatis dikonversi ke lowercase.
     *      - harus unik di tabel users, kecuali untuk email user yang sedang login.
     *
     * Request ini digunakan pada `ProfileController@update`.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     *         Array aturan validasi yang diterapkan pada request ini.
     */
    public function rules(): array
    {
        return [
            // Nama wajib diisi, string, max 255 karakter
            'name' => ['required', 'string', 'max:255'],

            // Email wajib diisi, valid, max 255 karakter, unik kecuali user saat ini
            'email' => [
                'required',
                'string',
                'lowercase', // otomatis dikonversi menjadi lowercase
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
