<?php

namespace App\Factories;

/**
 * Class ParticipantStatusFactory
 *
 * Faktori ini bertanggung jawab untuk mengelola status pendaftaran peserta
 * pada ekstrakurikuler. Ini termasuk validasi status yang diterima dan
 * operasi terkait lainnya.
 *
 * @package App\Factories
 */
class ParticipantStatusFactory
{
    public static function allowed(): array
    {
        return ['approved', 'pending', 'rejected'];
    }

    public static function validate(string $status): void
    {
        if (!in_array($status, self::allowed())) {
            throw new \InvalidArgumentException("Invalid status: $status");
        }
    }
}
