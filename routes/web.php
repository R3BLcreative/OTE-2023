<?php

use Illuminate\Support\Facades\Route;
use App\Models\ContactMsg;
use App\Mail\ContactReceived;
use App\Mail\ContactNotify;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;

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

Route::prefix('questions')->group(function () {
	Route::get('/', function () {
		return view('pages.questions');
	})->name('questions');

	Route::post('/', [ContactController::class, 'store'])->name('contact.store');
});

Route::prefix('emails')->group(function () {
	Route::get('/contact/received', function () {
		$msg = ContactMsg::find(1);
		return new ContactReceived($msg);
	})->name('emails.contact.received');

	Route::get('/contact/notify', function () {
		$msg = ContactMsg::find(1);
		return new ContactNotify($msg);
	})->name('emails.contact.notify');
});

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
