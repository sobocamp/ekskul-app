<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EkstrakurikulerRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan untuk melakukan request ini.
     *
     * Method ini mengembalikan nilai true, yang berarti seluruh pengguna
     * yang mengakses route terkait diperbolehkan melakukan permintaan ini.
     * Pada implementasi lebih kompleks, logic otorisasi dapat ditambahkan
     * berdasarkan role atau permission tertentu.
     *
     * @return bool  True jika request diizinkan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mendefinisikan aturan validasi untuk penyimpanan atau pembaruan data ekstrakurikuler.
     *
     * Aturan validasi mencakup:
     * - **name**: wajib diisi, bertipe string, dan maksimal 255 karakter.
     * - **description**: wajib diisi dan bertipe string.
     * - **quota**: wajib diisi, bertipe integer, dan minimal bernilai 1.
     * - **pembina_id**: wajib berupa array yang berisi daftar ID pembina.
     * - **pembina_id.\***: setiap elemen dalam array harus merupakan ID user yang ada (exists di tabel users).
     *
     * Digunakan pada proses `store()` dan `update()` pada EkstrakurikulerController.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     *         Array aturan validasi untuk request ini.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'quota' => ['required', 'integer', 'min:1'],
            'pembina_id' => ['required', 'array'],
            'pembina_id.*' => ['exists:users,id'],
        ];
    }
}
