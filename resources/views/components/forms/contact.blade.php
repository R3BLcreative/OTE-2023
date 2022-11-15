<x-forms::notifications :errors="$errors" />

<div class="@if (session()->has('message')) !hidden @endif">
	<form id="contact-form" action="{{ route('contact.store') }}#contact" class="grid grid-cols-2 gap-6" method="post" enctype="multipart/form-data" novalidate>
		@csrf
		@method('post')

		<x-fields::input class="col-span-1" id="fname" type="text" placeholder="Your first name" label="First Name" value="{{ old('fname') }}" />

		<x-fields::input class="col-span-1" id="lname" type="text" placeholder="Your last name" label="Last Name" value="{{ old('lname') }}" />

		<x-fields::input class="col-span-1" id="email" type="email" placeholder="Your email address" label="Email" value="{{ old('email') }}" />

		<x-fields::input class="col-span-1" id="cemail" type="email" placeholder="Confirm your email address" label="Confirm Email" value="{{ old('cemail') }}" />

		<x-fields::select class="col-span-2" id="subject" placeholder="Please select an option" label="What is the reason you are contacting us?" :options="['I have a question', 'I am interested in joining the leadership team', 'I have a story to share', 'Other...']" value="{{ old('subject') }}" />

		<x-fields::textarea class="col-span-2" id="message" placeholder="What would you like to ask/say?" label="Message" value="{{ old('message') }}" />

		<input type="submit" class="btn btn_primary" value="Send It">
	</form>
</div>