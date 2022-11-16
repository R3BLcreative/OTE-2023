<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Registration',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-yellow-400" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
				{{-- TITLE --}}
				<h1 class="h1 text-white">
					Child Camper Registration
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7">This form is for child camper registrations only. If you are an adult sponsor, please use <a href="{{ route('registration.adult') }}" title="Register as an adult sponsor for camp" aria-label="Register as an adult sponsor for camp" class="font-black"><u>this link</u></a> to register.</p>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7">If you are a group leader looking to register your group for camp, please use <a href="{{ route('registration.adult') }}" title="Register your group for camp" aria-label="Register your group for camp" class="font-black"><u>this link</u></a>.</p>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 flex justify-center">
				<img src="{{ asset('images/register_hero.jpg') }}" alt="An image of four male adult sponsors sitting on a bench under the covered dodgeball barn." width="852" height="602" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- GROUP REG FORM --}}

	</x-slot>

</x-layouts::default>