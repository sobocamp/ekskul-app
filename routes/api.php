<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EkstrakurikulerController;

Route::apiResource('/ekstrakurikuler', EkstrakurikulerController::class);
