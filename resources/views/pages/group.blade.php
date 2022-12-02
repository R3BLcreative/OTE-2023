<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Group Registration',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-body-50" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
				{{-- TITLE --}}
				<h1 class="h1 text-white">
					Group Registration
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7 text-body-200">This form is for <em><u>group registrations only</u></em>. If you are a parent of a <em><u>child camper</u></em> or an <em><u>adult sponsor</u></em> of a group that has already registered, please go to one of the corresponding links below.</p>

				<div class="flex mobile:flex-col tablet:flex-row items-center mobile:justify-center tablet:justify-between gap-4">
					<a href="{{ route('registration.adult') }}" title="Register as an adult sponsor for camp" aria-label="Register as an adult sponsor for camp" class="btn btn_alt_alt">
						Adult Sponsors
						<i class="fa-duotone fa-people-group fa-xl"></i>
					</a>

					<a href="{{ route('registration.child') }}" title="Register a child camper for camp" aria-label="Register a child camper for camp" class="btn btn_alt_alt">
						Child Campers
						<i class="fa-duotone fa-family fa-xl"></i>
					</a>
				</div>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 tablet:hidden laptop:block flex justify-center">
				<img src="{{ asset('images/register_group_hero.jpg') }}" alt="An image of many campers sitting in chairs getting ready for worship" width="800" height="600" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- GROUP REG FORM --}}
		<x-components::registrations id="group">
			<x-forms::groups />
		</x-components::registrations>

	</x-slot>

</x-layouts::default>