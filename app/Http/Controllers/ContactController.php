<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\ContactMsg;
use App\Mail\ContactReceived;
use App\Mail\ContactNotify;
use App\Jobs\UserContactNotify;
use App\Jobs\AdminContactNotify;

class ContactController extends Controller {
	public function store(Request $request) {
		// Validate request
		$request->validate(
			[
				'fname'								=> 'required|string',
				'lname'								=> 'required|string',
				'email'								=> 'required|email:rfc,dns',
				'cemail'							=> 'required|same:email',
				'subject'							=> 'required',
				'message'							=> 'required',
			],
			[
				'required'						=> 'This field is required.',
				'cemail.same'					=> 'The email fields do not match.',
			]
		);

		// Store request in DB
		$msg = ContactMsg::create([
			'fname'		=> strtolower($request->input('fname')),
			'lname'		=> strtolower($request->input('lname')),
			'email'		=> strtolower($request->input('email')),
			'subject'	=> $request->input('subject'),
			'message'	=> $request->input('message')
		]);

		// Send notification email to admin
		Mail::to('jcook@r3blcreative.com')->send(new ContactNotify($msg));

		// Send notification email to user
		Mail::to($msg->email)->send(new ContactReceived($msg));

		// Return with success/error message
		$error = false;
		if ($error == true) {
			$message = "UH OH... Looks like the internet gremlins are at it again. There was an issue on the server that prevented your message from being sent. We're sorry for the inconvenience, but can you please try sending it again.";
		} else {
			$message = "SUCCESS! We have recieved your message and one of our admins will be getting back to you in 24-48 hours. Check your inbox for a copy of the message you just sent.";
		}
		return redirect(route('questions') . '#contact')->with('message', $message);
	}
}
