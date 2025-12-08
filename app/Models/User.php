<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Extracurricular;
use App\Models\ExtracurricularRegistration;

/**
 * Class User
 *
 * Model ini mewakili pengguna sistem, baik siswa maupun pembina.
 *
 * @property int $id
 * @property string $name           Nama pengguna
 * @property string $email          Email pengguna
 * @property string $password       Password (hashed)
 * @property string $role           Role pengguna ('siswa' atau 'pembina')
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|ExtracurricularRegistration[] $registrations
 * @property-read \Illuminate\Database\Eloquent\Collection|Extracurricular[] $extracurriculars
 * @property-read \Illuminate\Database\Eloquent\Collection|Extracurricular[] $extracurricularsHandled
 * @property-read \Illuminate\Database\Eloquent\Collection|Extracurricular[] $extracurricularChoices
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal (mass assignable).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi (misal JSON).
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi tipe data untuk atribut tertentu.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi one-to-many ke ExtracurricularRegistration.
     *
     * Mengambil semua pendaftaran ekstrakurikuler milik user ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(ExtracurricularRegistration::class);
    }

    /**
     * Relasi many-to-many ke Extracurricular untuk siswa.
     *
     * Mengambil semua ekstrakurikuler yang dipilih/didaftar oleh user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(Extracurricular::class, 'extracurricular_user');
    }

    /**
     * Relasi many-to-many ke Extracurricular untuk pembina.
     *
     * Mengambil semua ekstrakurikuler yang dibina oleh user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurricularsHandled(): BelongsToMany
    {
        return $this->belongsToMany(Extracurricular::class, 'extracurricular_user');
    }

    /**
     * Relasi many-to-many ke Extracurricular melalui tabel pivot pendaftaran.
     *
     * Digunakan untuk mendapatkan pilihan ekstrakurikuler beserta periode pendaftarannya.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurricularChoices(): BelongsToMany
    {
        return $this->belongsToMany(Extracurricular::class, 'extracurricular_registrations')
                    ->withPivot('registration_period_id')
                    ->withTimestamps();
    }
}
