<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::prefix('session')->group(function () {
    Route::controller(SessionController::class)->group(function () {
        Route::post('/', action: 'create');
    });
});
