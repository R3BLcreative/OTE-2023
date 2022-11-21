<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Mail\GroupRegLeaderNotify;
use App\Mail\GroupRegAdminNotify;

class RegistrationController extends Controller {
	public function groups(Request $request) {
		// Validate request
		$request->validate(
			[
				'gname'			=> 'required|string',
				'gstreet'		=> 'required|string',
				'gcity'			=> 'required|string',
				'gstate'		=> 'required|string',
				'gzip'			=> 'required|integer|digits:5',
				'fname'			=> 'required|string',
				'lname'			=> 'required|string',
				'phone'			=> 'required',
				'email'			=> 'required|email:rfc,dns',
				'cemail'		=> 'required|same:email',
				'gcount'		=> 'required|integer',
				'marketing'	=> 'required|string',
			],
			[
				'required'			=> 'This field is required.',
				'cemail.same'		=> 'The email fields do not match.',
			]
		);

		// Store request in DB
		$group = Group::create([
			'group'			=> ucwords(strtolower($request->input('gname'))),
			'street'		=> ucwords(strtolower($request->input('gstreet'))),
			'city'			=> ucwords(strtolower($request->input('gcity'))),
			'state'			=> strtoupper($request->input('gstate')),
			'zip'				=> $request->input('gzip'),
			'fname'			=> ucwords(strtolower($request->input('fname'))),
			'lname'			=> ucwords(strtolower($request->input('lname'))),
			'phone'			=> $request->input('phone'),
			'email'			=> strtolower($request->input('email')),
			'count'			=> $request->input('gcount'),
			'deposit'		=> $request->input('gcount') * intval(str_replace('$', '', env('OTE_DEPOSIT'))),
			'marketing'	=> $request->input('marketing'),
			'camp'			=> $request->input('camp'),
			'year'			=> $request->input('year')
		]);

		// Send notification email to admin
		Mail::to('admin@otecamp.com')->bcc('jcook@r3blcreative.com')->send(new GroupRegAdminNotify($group));

		// Send notification email to user
		Mail::to($group->email)->bcc('jcook@r3blcreative.com')->send(new GroupRegLeaderNotify($group));

		// Return with success message
		$message = "SUCCESS! We have recieved your group's registration and one of our registration admins will contact you within a week to finalize your group's registration and set up deposit payment. A deposit of " . env('OTE_DEPOSIT') . " per camper is due to complete your initial registration. The total deposit amount is based off the expected number of people you entered in the group size field. Final payment will be based on the actual number of people who registered. This information and other additional details will be emailed to you shortly.";

		return redirect(route('registration.group'))->with('message', $message);
	}
}
