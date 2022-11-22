<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Group;
use App\Mail\GroupRegLeaderNotify;
use App\Mail\GroupRegAdminNotify;

class RegistrationController extends Controller {
	public function show(Request $request) {
		$groups = Group::select('id', 'group')
			->where('year', env('OTE_CAMP_YEAR'))
			->orderBy('group', 'asc')
			->get()->toArray();

		switch ($request->path()) {
			case 'registration/adult':
				$view = 'pages.adult';
				break;

			case 'registration/child':
			default:
				$view = 'pages.child';
				break;
		}

		$data = [];
		foreach ($groups as $group) {
			$data[$group['id']] = $group['group'];
		}

		return view($view)->with('groups', $data);
	}

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

	public function sponsors(Request $request) {
		// Validate request
		$request->validate(
			[
				'group'					=> 'required',
				'fname'					=> 'required|string',
				'lname'					=> 'required|string',
				'bday'					=> 'required',
				'shirt'					=> 'required',
				'gender'				=> 'required',
				'street'				=> 'required|string',
				'city'					=> 'required|string',
				'state'					=> 'required|string',
				'zip'						=> 'required|integer|digits:5',
				// Need to validate med-conditions
				'efname'				=> 'required|string',
				'elname'				=> 'required|string',
				'ephone'				=> 'required',
				'doctor'				=> 'required|string',
				'docphone'			=> 'required',
				'signature'			=> 'required|string'
			],
			[
				'required'			=> 'This field is required.',
			]
		);

		$bday = explode('-', $request->input('bday'));
		$age = (date("md", date("U", mktime(0, 0, 0, $bday[0], $bday[1], $bday[2]))) > date("md")
			? ((date("Y") - $bday[2]) - 1)
			: (date("Y") - $bday[2]));

		// Store request in DB
		$group = Registration::create([
			'group'							=> $request->input('group'),
			'type'							=> $request->input('type'),
			'fname'							=> ucwords(strtolower($request->input('fname'))),
			'lname'							=> ucwords(strtolower($request->input('lname'))),
			'birthday'					=> date('Y-m-d', strtotime($request->input('bday'))),
			'age'								=> $age,
			'shirt'							=> $request->input('shirt'),
			'gender'						=> $request->input('gender'),
			'street'						=> ucwords(strtolower($request->input('street'))),
			'city'							=> ucwords(strtolower($request->input('city'))),
			'state'							=> strtoupper($request->input('state')),
			'zip'								=> $request->input('zip'),
			// need to input 'conditions'				=> $request->input(''),
			// 'condition_details'	=> $request->input(''),
			'allergies'					=> $request->input('allergies'),
			'medications'				=> $request->input('medications'),
			'ice_fname'					=> ucwords(strtolower($request->input('efname'))),
			'ice_lname'					=> ucwords(strtolower($request->input('elname'))),
			'ice_phone'					=> $request->input('ephone'),
			'ins_company'				=> ucwords(strtolower($request->input('icompany'))),
			'ins_name'					=> ucwords(strtolower($request->input('insured'))),
			'ins_policy'				=> $request->input('policy'),
			'doctor'						=> ucwords(strtolower($request->input('doctor'))),
			'doc_phone'					=> $request->input('docphone'),
			'dentist'						=> ucwords(strtolower($request->input('dentist'))),
			'dent_phone'				=> $request->input('dentphone'),
			'esign'							=> ucwords(strtolower($request->input('signature'))),
			'camp'							=> $request->input('camp'),
			'year'							=> $request->input('year')
		]);

		// Return with success message
		$message = "SUCCESS! We have recieved your registration. Your group leader has all the details you need for camp. Please be sure to let them know that you have completed your registration. This is your confirmation that you have registered as there will not be any emails or correspondence to come.";

		return redirect(route($request->input('route')))->with('message', $message);
	}
}
