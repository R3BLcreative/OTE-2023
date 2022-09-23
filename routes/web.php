<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;

Route::get('/', function () {
	return view('pages.coming-soon');
})->name('coming-soon');

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
