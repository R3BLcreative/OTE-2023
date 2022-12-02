<x-forms::notifications :errors="$errors" />

<div class="@if (session()->has('message')) !hidden @endif">
	<form id="group-reg-form" action="{{ route('groups.store') }}" class="grid mobile:grid-cols-1 tablet:grid-cols-6 gap-6 w-full" method="post" enctype="multipart/form-data" novalidate>
		@csrf
		@method('post')

		<x-fields::hidden id="camp" value="1" />
		<x-fields::hidden id="year" value="{{ env('OTE_CAMP_YEAR') }}" />

		<h2 class="h2 col-span-full !drop-shadow-none">Group Details</h2>

		<x-fields::input class="col-span-full" id="gname" type="text" placeholder="FBC Church Group" label="Group Name" value="{{ old('gname') }}" required="1" desc="Enter the name of your church, group, or family here. This will be the name that your sponsors and parents will need to user when registering for camp." />

		<x-fields::input class="col-span-full" id="gstreet" type="text" placeholder="12345 Some Street #456" label="Mailing Address" value="{{ old('gstreet') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="gcity" type="text" placeholder="City" label="City" value="{{ old('gcity') }}" required="1" />

		@php
		$states = [
		'TX' => 'Texas',
		];
		@endphp

		<x-fields::select class="mobile:col-span-full tablet:col-span-2" id="gstate" placeholder="State" label="State" :options="$states" value="{{ old('gstate') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-2" id="gzip" type="text" placeholder="00000" slots="0" accepts="\d" label="Zip" value="{{ old('gzip') }}" required="1" />

		<hr class="my-6 col-span-full">

		<h2 class="h2 col-span-full !drop-shadow-none">Leader Details</h2>

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="fname" type="text" placeholder="John" label="Leader First Name" value="{{ old('fname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="lname" type="text" placeholder="Doe" label="Leader Last Name" value="{{ old('lname') }}" required="1" />

		<x-fields::input class="col-span-full" id="phone" type="text" placeholder="(___) ___-____" slots="_" accepts="\d" label="Leader Phone Number" value="{{ old('phone') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="email" type="email" placeholder="john@email.com" label="Leader Email" value="{{ old('email') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="cemail" type="email" placeholder="john@email.com" label="Confirm Leader Email" value="{{ old('cemail') }}" required="1" />

		<hr class="my-6 col-span-full">

		<h2 class="h2 col-span-full !drop-shadow-none">Other Details</h2>

		<x-fields::input class="mobile:col-span-full tablet:col-span-3" id="gcount" type="number" placeholder="How many are you expecting to bring?" label="Group Size" value="{{ old('gcount') }}" required="1" desc="Please include the total number of adult sponsors, child campers, and yourself." />

		@php
		$mark_options = [
		'Returning Group' => 'Returning Group',
		'Direct Mail' => 'Direct Mail',
		'Social Media' => 'Social Media',
		'Web Search' => 'Web Search',
		'Referral' => 'Referral',
		'Other' => 'Other'
		];
		@endphp

		<x-fields::select class="mobile:col-span-full tablet:col-span-3" id="marketing" placeholder="Please select one" label="How did you hear about us?" :options="$mark_options" value="{{ old('marketing') }}" required="1" />

		<div class="col-span-full">
			<input type="submit" class="btn btn_primary mx-auto" value="Submit Registration Form">
		</div>

	</form>
</div>