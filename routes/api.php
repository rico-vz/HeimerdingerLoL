<?php

use App\Http\Controllers\StreamerController;

Route::get('/streamers', [StreamerController::class, 'all']);
