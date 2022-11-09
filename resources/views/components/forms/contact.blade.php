<form action="" class="grid grid-cols-2 gap-6" method="" enctype="">
	<x-fields::input class="col-span-1" id="fname" type="text" placeholder="Your first name" label="First Name" />

	<x-fields::input class="col-span-1" id="lname" type="text" placeholder="Your last name" label="Last Name" />

	<x-fields::input class="col-span-1" id="email" type="email" placeholder="Your email address" label="Email" />

	<x-fields::input class="col-span-1" id="cemail" type="email" placeholder="Confirm your email address" label="Confirm Email" />

	<x-fields::select class="col-span-2" id="subject" placeholder="Please select an option" label="What is the reason you are contacting us?" :options="['I have a question', 'I am interested in joining the leadership team', 'I have a story to share', 'Other...']" />

	<x-fields::textarea class="col-span-2" id="message" placeholder="What would you like to ask/say?" label="Message" />

	<input type="submit" class="btn btn_primary" value="Send It">
</form>