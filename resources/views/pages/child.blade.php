<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Child Camper Registration',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-blue-600" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
				{{-- TITLE --}}
				<h1 class="h1 text-white">
					Child Camper Registration
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7 text-white">This form is for <em><u>child camper registrations only</u></em>. If you are a adult sponsor of a group or a group leader wanting to register their group, please use one of the corresponding links below.</p>

				<div class="flex flex-row items-center justify-between gap-4">
					<a href="{{ route('registration.group') }}" title="Register a group for camp" aria-label="Register a group for camp" class="btn btn_alt_alt">
						Group Leaders
						<i class="fa-duotone fa-users-medical fa-xl"></i>
					</a>

					<a href="{{ route('registration.adult') }}" title="Register as an adult sponsor for camp" aria-label="Register as an adult sponsor for camp" class="btn btn_alt_alt">
						Adult Sponsors
						<i class="fa-duotone fa-people-group fa-xl"></i>
					</a>
				</div>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 flex justify-center">
				<img src="{{ asset('images/register_child_hero.jpg') }}" alt="A group of 3 young girls with green painted handprints all over them" width="800" height="600" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- CAMPER REG FORM --}}
		<x-components::registrations id="camper">
			<x-forms::individuals :groups="$groups" type="camper" />
		</x-components::registrations>

	</x-slot>

</x-layouts::default>