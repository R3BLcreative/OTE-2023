<x-forms::notifications :errors="$errors" />

<div class="@if (session()->has('message')) !hidden @endif">
	<form id="contact-form" action="{{ route('contact.store') }}#contact" class="grid grid-cols-2 gap-6" method="post" enctype="multipart/form-data" novalidate>
		@csrf
		@method('post')

		<x-fields::input class="mobile:col-span-full tablet:col-span-1" id="fname" type="text" placeholder="Your first name" label="First Name" value="{{ old('fname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-1" id="lname" type="text" placeholder="Your last name" label="Last Name" value="{{ old('lname') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-1" id="email" type="email" placeholder="Your email address" label="Email" value="{{ old('email') }}" required="1" />

		<x-fields::input class="mobile:col-span-full tablet:col-span-1" id="cemail" type="email" placeholder="Confirm your email address" label="Confirm Email" value="{{ old('cemail') }}" required="1" />

		@php
		$subjects = [
		'I have a question' => 'I have a question',
		'I am interested in joining the leadership team' => 'I am interested in joining the leadership team',
		'I have a story to share' => 'I have a story to share',
		'Other...' => 'Other...'
		];
		@endphp

		<x-fields::select class="col-span-full" id="subject" placeholder="Please select an option" label="What is the reason you are contacting us?" :options="$subjects" value="{{ old('subject') }}" required="1" />

		<x-fields::textarea class="col-span-full" id="message" placeholder="What would you like to ask/say?" label="Message" value="{{ old('message') }}" required="1" />

		<input type="submit" class="btn btn_primary" value="Send It">
	</form>
</div>