@aware(['groups', 'type'])

@php
if($type == 'sponsor') {
$action = route('sponsors.store');
$route = 'registration.adult';
$title = 'Sponsor Details';
$layout = 'mobile:col-span-full tablet:col-span-2';
}else{
$action = route('campers.store');
$route = 'registration.child';
$title = 'Camper Details';
$layout = 'mobile:col-span-full tablet:col-span-3';
}
@endphp

<x-forms::notifications :errors="$errors" />

<div class="@if (session()->has('message')) !hidden @endif">
	<form id="sponsors-reg-form" action="{{ $action }}" class="grid mobile:grid-cols-1 tablet:grid-cols-6 gap-6 w-full" method="post" enctype="multipart/form-data" novalidate>
		@csrf
		@method('post')

		<x-fields::hidden id="route" value="{{ $route }}" />
		<x-fields::hidden id="type" value="{{ $type }}" />
		<x-fields::hidden id="camp" value="1" />
		<x-fields::hidden id="year" value="{{ env('OTE_CAMP_YEAR') }}" />

		{{-- DETAILS --}}

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">{{ $title }}</h2>

		<x-fields::select class="mobile:col-span-full tablet:col-span-2" id="group" placeholder="Select your group" label="Group Name" :options="$groups" value="{{ old('group') }}" required="1" desc="Select the group you are attending camp with. If you don't see your group, please contact your group leader." />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="fname" type="text" placeholder="John" label="First Name" value="{{ old('fname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="lname" type="text" placeholder="Doe" label="Last Name" value="{{ old('lname') }}" required="1" />

		<x-fields::input class="{{ $layout }}" id="bday" type="text" placeholder="__-__-____" slots="_" accepts="\d" label="Birthday" value="{{ old('bday') }}" required="1" desc="MM-DD-YYYY" />

		@if($type == 'camper')
		@php
		$grades = [
		'3' => 'Completed 3rd',
		'4' => 'Completed 4th',
		'5' => 'Completed 5th',
		'6' => 'Completed 6th',
		];
		@endphp
		<x-fields::select class="mobile:col-span-full tablet:col-span-3" id="grade" placeholder="Select one" label="Completed Grade" :options="$grades" value="{{ old('grade') }}" required="1" />
		@endif

		@php
		$sizes = [
		'Youth Sizes' => [
		'YXS' => 'YXS',
		'YS' => 'YS',
		'YM' => 'YM',
		'YL' => 'YL',
		'YXL' => 'YXL'
		],
		'Adult Sizes' => [
		'XS' => 'XS',
		'S' => 'S',
		'M' => 'M',
		'L' => 'L',
		'XL' => 'XL',
		'2XL' => '2XL',
		'3XL' => '3XL',
		'4XL' => '4XL'
		]
		];
		@endphp
		<x-fields::select class="{{ $layout }}" id="shirt" placeholder="Select one" label="Shirt Size" :options="$sizes" value="{{ old('shirt') }}" required="1" />

		@php
		$genders = [
		'male' => 'Male',
		'female' => 'Female'
		];
		@endphp
		<x-fields::select class="{{ $layout }}" id="gender" placeholder="Select one" label="Gender" :options="$genders" value="{{ old('gender') }}" required="1" />

		<x-fields::input class="col-span-full" id="street" type="text" placeholder="12345 Some Street #456" label="Home Address" value="{{ old('street') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="city" type="text" placeholder="City" label="City" value="{{ old('city') }}" required="1" />

		@php
		$states = [
		'TX' => 'Texas',
		];
		@endphp

		<x-fields::select class="mobile:col-span-full tablet:col-span-2" id="state" placeholder="State" label="State" :options="$states" value="{{ old('state') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="zip" type="text" placeholder="00000" slots="0" accepts="\d" label="Zip" value="{{ old('zip') }}" required="1" />

		@if($type == 'camper')

		{{-- GAURDIAN --}}

		<hr class="my-6 col-span-full">

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">Parent/Gaurdian Details</h2>

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="gfname" type="text" placeholder="John" label="First Name" value="{{ old('gfname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="glname" type="text" placeholder="Doe" label="Last Name" value="{{ old('glname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="grel" type="text" placeholder="Dad, Mom, etc." label="Relationship" value="{{ old('grel') }}" required="1" desc="How is the person listed here related to the camper?" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="gemail" type="email" placeholder="john@email.com" label="Email" value="{{ old('gemail') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="gcemail" type="email" placeholder="john@email.com" label="Confirm Email" value="{{ old('gcemail') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="gcphone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Cell Phone" value="{{ old('gcphone') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="ghphone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Home Phone" value="{{ old('ghphone') }}" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="gwphone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Work Phone" value="{{ old('gwphone') }}" />

		@endif

		{{-- HISTORY --}}

		<hr class="my-6 col-span-full">

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">Medical Conditions</h2>

		@php
		$conditions = [
		'Asthma' => 'Asthma',
		'Bleeding Disorder' => 'Bleeding Disorder',
		'Broken Bones' => 'Broken Bones',
		'Diabetes' => 'Diabetes',
		'Epilepsy' => 'Epilepsy',
		'Heart Conditions' => 'Heart Conditions',
		'Hypertension' => 'Hypertension',
		'Kidney Conditions' => 'Kidney Conditions',
		'Seizures' => 'Seizures',
		'Thyroid' => 'Thyroid',
		'Other' => 'Other'
		];
		@endphp
		<x-fields::check class="col-span-full" id="conds" label="Medical Conditions" :options="$conditions" cols="3" desc="Check any and all conditions that this child/adult currently has or has had in the past and then explain specifically:" details="1" detailsMax="500" />

		<div class="col-span-full bg-yellow-400 rounded-lg shadow-sm p-6 text-lg">
			<p><strong>VERY IMPORTANT!</strong> &mdash; Texas state law requires that certain information be disclosed. Your cooperation as leaders and parents will aid in that. This form <strong>must have allergy and current immunization</strong> information listed with exact dates for anyone under 18. This may be an inconvenience but state law <strong><u>requires guests to be sent home immediately</u></strong> that do not give complete information.</p>
		</div>

		<x-fields::textarea class="col-span-full" id="allergies" placeholder="List any and all allergies here..." label="Allergies" value="{{ old('allergies') }}" max="500" desc="Please list and explain any allergies in the field below." />

		@if($type == 'camper')

		{{-- IMMUNIZATIONS --}}

		<hr class="my-6 col-span-full">

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">Immunizations</h2>

		<div class="col-span-full grid mobile:grid-cols-1 tablet:grid-cols-2 laptop:grid-cols-6 gap-6" data-hasDeps="1">

			<div class="col-span-full flex flex-row items-center justify-start gap-4">
				<input type="checkbox" value="immOptOut" id="immOptOut" name="immOptOut" class="cursor-pointer" @if(old('immOptOut'))aria-expanded="false" @else aria-expanded="true" @endif aria-controls="immWrap" data-deps="" @if(old('immOptOut'))checked="checked" @endif>
				<label for="immOptOut" class="cursor-pointer">Check this box if you have chosen to not have your child immunized.</label>
			</div>

			@php
			if(old('immOptOut')) {
			$showImm = false;
			}else{
			$showImm = true;
			}
			@endphp

			<div id="immWrap" class="col-span-full grid mobile:grid-cols-1 tablet:grid-cols-6 gap-6 @if($showImm) max-h-[500px] opacity-1 @else max-h-0 opacity-0 @endif transition-all ease-in-out duration-500 overflow-hidden" @if(old('immOptOut'))aria-expanded="false" @else aria-expanded="true" @endif>
				<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="dptdt" type="text" placeholder="__-__-____" slots="_" accepts="\d" label="DPT/DT" value="{{ old('dptdt') }}" required="1" desc="MM-DD-YYYY" />

				<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="polio" type="text" placeholder="__-__-____" slots="_" accepts="\d" label="Polio" value="{{ old('polio') }}" required="1" desc="MM-DD-YYYY" />

				<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="mmr" type="text" placeholder="__-__-____" slots="_" accepts="\d" label="MMR" value="{{ old('mmr') }}" required="1" desc="MM-DD-YYYY" />

				<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="tb" type="text" placeholder="__-__-____" slots="_" accepts="\d" label="TB" value="{{ old('tb') }}" required="1" desc="MM-DD-YYYY" />
			</div>

		</div>

		@endif

		{{-- MEDS --}}

		<hr class="my-6 col-span-full">

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">Medications</h2>

		<x-fields::textarea class="col-span-full" id="medications" placeholder="List any and all medications and instructions here..." label="Medications" value="{{ old('medications') }}" max="500" desc="Please list any medications and instructions in the field below." />

		<div class="col-span-full bg-yellow-400 rounded-lg shadow-sm p-6 text-sm">
			<p>** Texas law <u>requires</u> that all prescription medications (meds) for children & youth be stored & dispensed only by the Camp Health Officer (CHO). For a further step of safety, TBE <u>recommends</u> that all youth & adult meds, prescription & non-prescription, be stored & dispensed only by the CHO. This recommendation will be at the discretion of the group leader and the CHO. Prescription meds shall be sent in the original container with prescription label and gathered in a clear ziploc-type bag with camper name & church clearly marked. Upon camper arrival, the CHO shall place meds and related paraphernalia in a lockable storage area not accessible to campers. Meds shall be administered only by the CHO, unless otherwise allowed. At no time shall a child or youth be allowed to carry or self-administer meds without adult supervision, except in the case of immediate-use meds needed for life-threatening conditions (i.e. bee-sting meds, inhaler, etc…) and limited medications approved for use in first-aid kits. In each of these cases, the camp shall have on file a written statement of medical necessity from the prescribing doctor or the written approval of the Camp Health Officer for any camper to carry medication and related paraphernalia or devices.</p>
		</div>

		{{-- EMERGENCY AUTH --}}

		<hr class="my-6 col-span-full">

		<h2 class="h3 col-span-full text-3xl uppercase !drop-shadow-none">Emergency Details</h2>

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="efname" type="text" placeholder="John" label="Emergency Contact" value="{{ old('efname') }}" required="1" desc="First Name" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="elname" type="text" placeholder="Doe" value="{{ old('elname') }}" desc="Last Name" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="ephone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Phone Number" value="{{ old('ephone') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="icompany" type="text" placeholder="United Health" label="Insurance Company" value="{{ old('icompany') }}" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="insured" type="text" placeholder="John Doe" label="Name of Insured" value="{{ old('insured') }}" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="policy" type="text" placeholder="1234567890" label="Policy Number" value="{{ old('policy') }}" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="doctor" type="text" placeholder="John Doe" label="Name of Doctor" value="{{ old('doctor') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="docphone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Phone Number" value="{{ old('docphone') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="dentist" type="text" placeholder="John Doe" label="Name of Dentist" value="{{ old('dentist') }}" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="dentphone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Phone Number" value="{{ old('dentphone') }}" />
		@php
		$terms = "I understand that any youth or adult with a high fever will be sent home. I hereby authorize the camp health officer to administer medication to this child. If a medical emergency should arise while the above youth or adult is in attendance at TBE, I hereby authorize the camp health officer or camp director to provide care and/or transport them to a medical facility. I further authorize the medical facility to administer necessary care upon arrival. I do understand that camper insurance at TBE is secondary to personal insurance which should be used for any claims occurring at TBE. I acknowledge that I am signing by means of an electronically-produced signature, that shall have the same legal effect as if, such signature had been manually written and shall be deemed to have been signed by myself for the purposes of any statute or rule of law that requires. I acknowledge that, in any legal proceedings between myself and TBE in any way relating to this computer-based registration form, each party expressly waives any right to raise any defence or waiver of liability based upon the execution of this authorization by a party by means of an electronically- produced signature.";
		@endphp
		<x-fields::textarea rows="5" class="mobile:col-span-full tablet:col-span-3" id="terms" placeholder="" label="Acknowledgements" value="{{ $terms }}" disabled="1" desc="Please read the following statment in full before signing." />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="signature" type="text" placeholder="John Doe" label="Emergency Authorization Signature" value="{{ old('signature') }}" desc="Please type your full name above. By typing your name you are accepting the acknowledgements outlined in the Acknowledgments field." required="1" />

		<div class="col-span-full">
			<input type="submit" class="btn btn_primary mx-auto" value="Submit Registration Form">
		</div>
	</form>
</div>