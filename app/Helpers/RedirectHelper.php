<?php

namespace App\Helpers;

use App\Enums\ToastMessage;
use App\Enums\ToastType;
use Illuminate\Http\RedirectResponse;

class RedirectHelper
{
    public static function redirectWithToast(RedirectResponse $redirect, ToastType $type, ToastMessage $message): RedirectResponse
    {
        return $redirect->with('toast', [
            'type' => $type->value,
            'message' => $message->value
        ]);
    }

    public static function backWithToast(RedirectResponse $redirect, ToastType $type, ToastMessage $message): RedirectResponse
    {
        return $redirect->with('toast', [
            'type' => $type->value,
            'message' => $message->value
        ]);
    }
}
