<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function() {
    Route::get('/search', [SearchController::class, 'search']);
});
