<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;

Route::get('/coming-soon', function () {
	return view('pages.coming-soon');
})->name('coming-soon');

Route::get('/', function () {
	return view('pages.home');
})->name('home');

Route::get('/camp', function () {
	return view('pages.camp');
})->name('camp');

Route::get('/resources', function () {
	return view('pages.resources');
})->name('resources');

// Route::get('/about', function () {
// 	return view('pages.home');
// })->name('about');

Route::get('/registration', function () {
	return view('pages.home');
})->name('registration');

Route::get('/questions', function () {
	return view('pages.questions');
})->name('questions');

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
