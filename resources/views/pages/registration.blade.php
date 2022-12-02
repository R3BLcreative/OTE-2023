@php
$regOpen = env('OTE_REG_OPEN');
$regOpen = explode('/', $regOpen);
$regOpen = mktime(0,0,0,$regOpen[0],$regOpen[1],$regOpen[2]);
$regClose = env('OTE_REG_CLOSE');
$regClose = explode('/', $regClose);
$regClose = mktime(0,0,0,$regClose[0],$regClose[1],$regClose[2]);
$now = strtotime('now');

$open = ($now >= $regOpen && $now <= $regClose) ? true : false;
	@endphp

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
					Registration
				</h1>

				@if($now >= $regOpen && $now <= $regClose)
					<p class="mobile:text-base tablet:text-lg font-semibold leading-7">Registration is completely done online and there are a couple steps to get your church/group/family registered.</p>

					<p class="mobile:text-base tablet:text-lg font-semibold leading-7">If you're <u>new to Over the Edge</u>, read through the details below to familiarize yourself with the registration process.</p>

					<p class="mobile:text-base tablet:text-lg font-semibold leading-7"><u>OTE veterans</u> can simply click the <em>"Get Started"</em> button below to start the registration process.</p>

					<a href="{{ route('registration.group') }}" title="Start the registration process" aria-label="Start the registration process" class="btn btn_alt_alt">
						Get Started
						<i class="fa-duotone fa-arrow-right-to-arc fa-xl"></i>
					</a>
					@elseif ($now
					< $regOpen)
						<x-components::reg-closed />
					@else
					<x-components::reg-passed />
					@endif
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 tablet:hidden laptop:block flex justify-center">
				<img src="{{ asset('images/register_hero.jpg') }}" alt="An image of four male adult sponsors sitting on a bench under the covered dodgeball barn." width="852" height="602" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- STEP 1 --}}
		<x-components::reg-step-one :open="$open" />

		{{-- STEP 2 --}}
		<x-components::reg-step-two :open="$open" />

		{{-- STEP 3 --}}
		<x-components::reg-step-three :open="$open" />


	</x-slot>

	</x-layouts::default>