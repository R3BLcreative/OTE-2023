@props(['open'])

<section id="reg-step-one" class="">
	<row class="items-center">

		<div class="col-span-full flex flex-col items-center justify-center gap-8">
			<div class="text-center">
				<span class="text-2xl text-body-50 font-serif font-semibold">STEP 3</span>
				<h2 class="h2 mobile:!text-4xl tablet:!text-6xl !drop-shadow-sm text-yellow-500">Sponsor & Camper Registration</h2>
			</div>

			<p class="text-center font-semibold">Once you have registered your group, you can send the sponsor and camper registration links out to your adult sponsors and parents. The only thing they will need to know from you is the group name you registered.</p>

			<p class="font-semibold">Child campers are limited to those who have <strong>completed 3rd - 6th grade</strong>.</p>

			@if($open)
			<p class="text-center font-semibold">The links below will also be sent in the email you recieve after you register your group in Step 1.</p>

			<div class="flex mobile:flex-col tablet:flex-row items-center justify-between gap-6">
				<a href="{{ route('registration.adult') }}" title="Register as an adult sponsor for camp" aria-label="Register as an adult sponsor for camp" class="btn btn_primary">
					Adult Sponsor Registration
					<i class="fa-duotone fa-people-group fa-xl"></i>
				</a>

				<a href="{{ route('registration.child') }}" title="Register a child camper for camp" aria-label="Register a child camper for camp" class="btn btn_secondary">
					Child Camper Registration
					<i class="fa-duotone fa-family fa-xl"></i>
				</a>
			</div>
			@endif
		</div>
	</row>
</section>