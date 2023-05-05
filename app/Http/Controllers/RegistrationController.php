<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Group;
use App\Mail\RegUserNotify;
use App\Mail\RegLeaderNotify;
use App\Mail\RegAdminNotify;
use App\Mail\GroupRegLeaderNotify;
use App\Mail\GroupRegAdminNotify;
use Airtable;

class RegistrationController extends Controller {
	public function show(Request $request) {
		$groups = Group::select('id', 'group')
			->where('year', setting('camp_year'))
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
			'group'			=> $request->input('gname'),
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

		$group = $group->fresh();

		// Store request in AirTable
		$airtable = Airtable::table('groups')->create([
			'Church_Name'				=> $request->input('gname'),
			'Church_Address'		=> ucwords(strtolower($request->input('gstreet'))),
			'Church_City'				=> ucwords(strtolower($request->input('gcity'))),
			'Church_State'			=> strtoupper($request->input('gstate')),
			'Church_Zip'				=> $request->input('gzip'),
			'Contact_First'			=> ucwords(strtolower($request->input('fname'))),
			'Contact_Last'			=> ucwords(strtolower($request->input('lname'))),
			'Contact_Phone'			=> $request->input('phone'),
			'Contact_Email'			=> strtolower($request->input('email')),
			'Expected'					=> $request->input('gcount'),
			'Marketing'					=> $request->input('marketing'),
			'Camp'							=> [env('AIRTABLE_CAMP_ID')]
		]);

		// Update DB record with Airtable Group_ID
		$atArray = $airtable->toArray();
		$group->ATID = $atArray['id'];
		$group->save();


		// Send notification email to admin
		Mail::to('admin@otecamp.com')->cc('dave@otecamp.com')->send(new GroupRegAdminNotify($group));

		// Send notification email to user
		Mail::to($group->email)->send(new GroupRegLeaderNotify($group));

		// Return with success message
		$message = "SUCCESS! We have recieved your group's registration and one of our registration admins will contact you within a week to finalize your group's registration and set up deposit payment. A deposit of " . setting('camp_deposit') . " per camper is due to complete your initial registration. The total deposit amount is based off the expected number of people you entered in the group size field. Final payment will be based on the actual number of people who registered. This information and other additional details will be emailed to you shortly.";

		return redirect(route('registration.group'))->with('message', $message);
	}

	public function store(Request $request) {
		// Validate request
		$request->validate(
			[
				'group'						=> 'required',
				'fname'						=> 'required|string',
				'lname'						=> 'required|string',
				'bday'						=> 'required',
				'grade'						=> 'required_if:type,camper',
				'shirt'						=> 'required',
				'gender'					=> 'required',
				'street'					=> 'required|string',
				'city'						=> 'required|string',
				'state'						=> 'required|string',
				'zip'							=> 'required|integer|digits:5',
				'gfname'					=> 'required_if:type,camper',
				'glname'					=> 'required_if:type,camper',
				'grel'						=> 'required_if:type,camper',
				'gemail'					=> 'required_if:type,camper|email:rfc,dns',
				'gcemail'					=> 'required_if:type,camper|same:gemail',
				'gcphone'					=> 'required_if:type,camper',
				'dptdt'						=> 'prohibited_if:type,sponsor|required_if:immOptOut,null',
				'polio'						=> 'prohibited_if:type,sponsor|required_if:immOptOut,null',
				'mmr'							=> 'prohibited_if:type,sponsor|required_if:immOptOut,null',
				'tb'							=> 'prohibited_if:type,sponsor|required_if:immOptOut,null',
				'efname'					=> 'required|string',
				'elname'					=> 'required|string',
				'ephone'					=> 'required',
				'doctor'					=> 'required|string',
				'docphone'				=> 'required',
				'signature'				=> 'required|string',
				'conds-details'		=> 'required_with:conds_1,conds_2,conds_3,conds_4,conds_5,conds_6,conds_7,conds_8,conds_9,conds_10,conds_11'
			],
			[
				'required'					=> 'This field is required.',
				'required_if'				=> 'This field is required.',
				'required_unless'		=> 'This field is required.',
				'required_without'	=> 'This field is required.',
				'required_with'			=> 'This field is required if any of the items above are checked.',
				'gcemail.same'			=> 'The email fields do not match.'
			]
		);

		$bday = explode('-', $request->input('bday'));
		$dobs = mktime(0, 0, 0, $bday[0], $bday[1], $bday[2]);
		$dob = date("Y-m-d", $dobs);
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dob), date_create($today));
		$age = $diff->format('%y');

		if ($request->input('type') == 'camper') {
			$optout = ($request->input('immOptOut')) ? true : false;
			if ($optout === false) {
				$dptdt = explode('-', $request->input('dptdt'));
				$dptdt = mktime(0, 0, 0, $dptdt[0], $dptdt[1], $dptdt[2]);

				$polio = explode('-', $request->input('polio'));
				$polio = mktime(0, 0, 0, $polio[0], $polio[1], $polio[2]);

				$mmr = explode('-', $request->input('mmr'));
				$mmr = mktime(0, 0, 0, $mmr[0], $mmr[1], $mmr[2]);

				$tb = explode('-', $request->input('tb'));
				$tb = mktime(0, 0, 0, $tb[0], $tb[1], $tb[2]);
			} else {
				$dptdt = null;
				$polio = null;
				$mmr = null;
				$tb = null;
			}
		} else {
			$optout = false;
			$dptdt = null;
			$polio = null;
			$mmr = null;
			$tb = null;
		}

		$conditions = [
			'conds_1'		=> $request->input('conds_1'),
			'conds_2'		=> $request->input('conds_2'),
			'conds_3'		=> $request->input('conds_3'),
			'conds_4'		=> $request->input('conds_4'),
			'conds_5'		=> $request->input('conds_5'),
			'conds_6'		=> $request->input('conds_6'),
			'conds_7'		=> $request->input('conds_7'),
			'conds_8'		=> $request->input('conds_8'),
			'conds_9'		=> $request->input('conds_9'),
			'conds_10'	=> $request->input('conds_10'),
			'conds_11'	=> $request->input('conds_11')
		];

		$conditions = array_filter($conditions);

		// Store request in DB
		$reg = Registration::create([
			'group_id'					=> $request->input('group'),
			'type'							=> $request->input('type'),
			'fname'							=> ucwords(strtolower($request->input('fname'))),
			'lname'							=> ucwords(strtolower($request->input('lname'))),
			'birthday'					=> $dobs,
			'age'								=> $age,
			'grade'							=> $request->input('grade'),
			'shirt'							=> $request->input('shirt'),
			'gender'						=> $request->input('gender'),
			'street'						=> ucwords(strtolower($request->input('street'))),
			'city'							=> ucwords(strtolower($request->input('city'))),
			'state'							=> strtoupper($request->input('state')),
			'zip'								=> $request->input('zip'),
			'parent_fname'			=> ucwords(strtolower($request->input('gfname'))),
			'parent_lname'			=> ucwords(strtolower($request->input('glname'))),
			'parent_rel'				=> strtolower($request->input('grel')),
			'parent_email'			=> strtolower($request->input('gemail')),
			'parent_cell'				=> $request->input('gcphone'),
			'parent_home'				=> $request->input('ghphone'),
			'parent_work'				=> $request->input('gwphone'),
			'conditions'				=> json_encode($conditions),
			'condition_details'	=> $request->input('conds-details'),
			'allergies'					=> $request->input('allergies'),
			'imm_optout'				=> $optout,
			'imm_dptdt'					=> $dptdt,
			'imm_polio'					=> $polio,
			'imm_mmr'						=> $mmr,
			'imm_tb'						=> $tb,
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

		$reg = $reg->fresh();

		// Store request in AirTable
		$airtable = Airtable::table('regs')->create([
			'Group'						=> [$reg->group->ATID],
			'Type'							=> ucfirst($request->input('type')),
			'First_Name'				=> ucwords(strtolower($request->input('fname'))),
			'Last_Name'					=> ucwords(strtolower($request->input('lname'))),
			'Grade'							=> $request->input('grade'),
			'Shirt'							=> $request->input('shirt'),
			'Gender'						=> ucfirst($request->input('gender')),
			'Reg_Form'					=> URL::to('/pdf/view/' . $reg->id)
		]);

		// Update DB record with Airtable REG_ID
		$atArray = $airtable->toArray();
		$reg->ATID = $atArray['id'];
		$reg->save();

		// Send notification email to admin
		Mail::to('admin@otecamp.com')->bcc('dave@otecamp.com')->send(new RegAdminNotify($reg));

		// Send notification email to user
		Mail::to($reg->email)->send(new RegUserNotify($reg));

		// Send notification email to leader
		Mail::to($reg->group->email)->send(new RegLeaderNotify($reg));

		// Return with success message
		$message = "SUCCESS! We have recieved your registration. Your group leader has all the details you need for camp. A copy of your registration has been emailed to you for your reference. Another copy has been sent to your group leader. If you have nay questions please direct them to your group leader. Thanks for being the best part of Over The Edge! We can't wait to see you at camp.";

		return redirect(route($request->input('route')))->with('message', $message);
	}
}
