<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Registration;
use App\Models\Group;
use App\Models\ContactMsg;
use App\Mail\RegUserNotify;
use App\Mail\RegLeaderNotify;
use App\Mail\RegAdminNotify;
use App\Mail\GroupRegLeaderNotify;
use App\Mail\GroupRegAdminNotify;
use App\Mail\ContactReceived;
use App\Mail\ContactNotify;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\ContactController;

// COMING SOON
Route::get('/coming-soon', function () {
	return view('pages.coming-soon');
})->name('coming-soon');

// HOME
Route::get('/', function () {
	return view('pages.home');
})->name('home');

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

	Route::get('/adult', [RegistrationController::class, 'show'])->name('registration.adult');

	Route::post('/sponsors', [RegistrationController::class, 'store'])->name('sponsors.store');

	Route::get('/child', [RegistrationController::class, 'show'])->name('registration.child');

	Route::post('/campers', [RegistrationController::class, 'store'])->name('campers.store');
});

// PDF PREVIEWS
Route::prefix('pdf')->group(function () {
	Route::get('/', function () {
		$reg = Registration::where(['id' => 1])->first();
		$pdf = Pdf::loadView('pdf.form', ['reg' => $reg]);
		return $pdf->stream();
	})->name('pdf.test');

	Route::get('/download', function () {
		$regs = Registration::orderBy('group_id')->orderByDesc('type')->get();
		$pdf = Pdf::loadView('pdf.download', ['regs' => $regs]);
		return $pdf->download('Camp_' . env('OTE_CAMP_YEAR') . '.pdf');
	})->name('pdf.download');

	Route::get('/view/{id}', function ($id) {
		$reg = Registration::where(['id' => $id])->first();
		$pdf = Pdf::loadView('pdf.form', ['reg' => $reg]);
		return $pdf->stream();
	})->name('pdf.form');
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

	Route::get('/registration/admin', function () {
		$reg = Registration::where(['type' => 'camper'])->first();
		return new RegAdminNotify($reg);
	})->name('emails.reg.admin');

	Route::get('/registration/leader', function () {
		$reg = Registration::where(['type' => 'camper'])->first();
		return new RegLeaderNotify($reg);
	})->name('emails.reg.leader');

	Route::get('/registration/user', function () {
		$reg = Registration::where(['type' => 'camper'])->first();
		return new RegUserNotify($reg);
	})->name('emails.reg.user');
});

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
