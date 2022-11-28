<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Adult Sponsor Registration',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-neutral-800" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
				{{-- TITLE --}}
				<h1 class="h1 text-white">
					Adult Sponsor Registration
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7 text-white">This form is for <em><u>adult sponsor registrations only</u></em>. If you are a parent of a child camper or a group leader wanting to register their group, please use one of the corresponding links below.</p>

				<div class="flex flex-row items-center justify-between gap-4">
					<a href="{{ route('registration.group') }}" title="Register a group for camp" aria-label="Register a group for camp" class="btn btn_alt_alt">
						Group Leaders
						<i class="fa-duotone fa-users-medical fa-xl"></i>
					</a>

					<a href="{{ route('registration.child') }}" title="Register a child camper for camp" aria-label="Register a child camper for camp" class="btn btn_alt_alt">
						Child Campers
						<i class="fa-duotone fa-family fa-xl"></i>
					</a>
				</div>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 flex justify-center">
				<img src="{{ asset('images/register_hero.jpg') }}" alt="An image of four male adult sponsors sitting on a bench under the covered dodgeball barn." width="852" height="602" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- SPONSOR REG FORM --}}
		<x-components::registrations id="sponsor">
			<x-forms::individuals :groups="$groups" type="sponsor" />
		</x-components::registrations>

	</x-slot>

</x-layouts::default>