<?php

use Illuminate\Support\Facades\Route;
use App\Models\Group;
use App\Models\ContactMsg;
use App\Mail\GroupRegLeaderNotify;
use App\Mail\GroupRegAdminNotify;
use App\Mail\ContactReceived;
use App\Mail\ContactNotify;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;

// COMING SOON
Route::get('/coming-soon', function () {
	return view('pages.coming-soon');
})->name('coming-soon');

// HOME
Route::get('/', function () {
	return view('pages.home');
})->name('home');

// CAMP
Route::get('/camp', function () {
	return view('pages.camp');
})->name('camp');

// RESOURCES
Route::get('/resources', function () {
	return view('pages.resources');
})->name('resources');

// Route::get('/about', function () {
// 	return view('pages.home');
// })->name('about');

// QUESTIONS
Route::prefix('questions')->group(function () {
	Route::get('/', function () {
		return view('pages.questions');
	})->name('questions');

	Route::post('/', [ContactController::class, 'store'])->name('contact.store');
});


Route::prefix('registration')->group(function () {
	Route::get('/', function () {
		return view('pages.registration');
	})->name('registration');

	Route::get('/group', function () {
		return view('pages.group');
	})->name('registration.group');

	Route::post('/groups', [RegistrationController::class, 'groups'])->name('groups.store');

	Route::get('/adult', function () {
		return view('pages.adult');
	})->name('registration.adult');

	Route::post('/sponsors', [RegistrationController::class, 'sponsors'])->name('sponsors.store');

	Route::get('/child', function () {
		return view('pages.child');
	})->name('registration.child');

	Route::post('/campers', [RegistrationController::class, 'campers'])->name('campers.store');
});

// EMAIL PREVIEWS
Route::prefix('emails')->group(function () {
	Route::get('/contact/received', function () {
		$msg = ContactMsg::find(1);
		return new ContactReceived($msg);
	})->name('emails.contact.received');

	Route::get('/contact/notify', function () {
		$msg = ContactMsg::find(1);
		return new ContactNotify($msg);
	})->name('emails.contact.notify');

	Route::get('/registration/groups/admin', function () {
		$group = Group::find(1);
		return new GroupRegAdminNotify($group);
	})->name('emails.reg.group.admin');

	Route::get('/registration/groups/leader', function () {
		$group = Group::find(1);
		return new GroupRegLeaderNotify($group);
	})->name('emails.reg.group.leader');
});

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
