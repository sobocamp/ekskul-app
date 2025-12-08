<?php

namespace App\Traits;

use App\Models\RegistrationPeriod;
use App\Enums\ToastType;
use App\Enums\ToastMessage;
use App\Helpers\RedirectHelper;

trait ExtracurricularHelper
{
    /**
     * Mendapatkan periode aktif atau redirect error.
     */
    public function getActivePeriodOrFail()
    {
        $period = RegistrationPeriod::where('is_active', true)->first();

        if (!$period) {
            return RedirectHelper::backWithToast(
                back(),
                ToastType::ERROR,
                ToastMessage::EXTRACURRICULAR_PERIOD_NOT_ACTIVE
            );
        }

        return $period;
    }

    /**
     * Mengecek apakah siswa sudah mendaftar pada periode tersebut.
     */
    public function checkAlreadyJoined($extracurricular, $userId, $periodId)
    {
        return $extracurricular->participants()
            ->where('user_id', $userId)
            ->where('registration_period_id', $periodId)
            ->exists();
    }

    /**
     * Update status pivot (approved/pending/rejected).
     */
    public function updateParticipantStatus($extracurricular, $userId, $status)
    {
        return $extracurricular->participants()->updateExistingPivot($userId, [
            'status' => $status
        ]);
    }
}
