<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Camp 2023',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-ote bg-cover bg-center bg-no-repeat" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="flex justify-center">
				<img src="{{ asset('images/logo_campTheme.png') }}" alt="Among Us: OTE 2023 Camp Theme" width="898" height="914" class="rounded-lg mobile:max-w-[300px] laptop:max-w-[400px]">
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="backdrop-blur-sm px-6 py-12 rounded-xl flex flex-col items-center justify-center gap-6">
				<img src="{{ asset('images/logo_white.png') }}" alt="Over the Edge Preteen Camp" width="1086" height="592" class="">

				{{-- TITLE --}}
				<h1 class="h2 text-white">
					Among Us
				</h1>

				<p class="mobile:text-base tablet:text-lg text-white font-semibold leading-7 text-center mb-6"></p>

				@php
					$now = strtotime('now');
					$deadline = strtotime(setting('camp_deadline') . ' 12:00 am');
				@endphp

				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">DATES:</strong>
					<span class="text-white font-semibold">{{ setting('camp_dates') }}</span>
				</div>
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">AGES:</strong>
					<span class="text-white font-semibold">Completed 3rd-6th</span>
				</div>
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">COST:</strong>
					@if($now < $deadline)
						<span class="text-white font-semibold">{{ setting('camp_cost') }}/person</span>
					@else
						<span class="text-white font-semibold">{{ setting('late_cost') }}/person</span>
					@endif
				</div>
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">DEPOSIT:</strong>
					<span class="text-white font-semibold">{{ setting('camp_deposit') }}/person <sup>1</sup></span>
				</div>

				@if($now < $deadline)
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">DEADLINE:</strong>
					<span class="text-white font-semibold">{{ setting('camp_deadline') }}</span>
					{{-- <span class="text-white font-semibold">{{ setting('camp_deadline') }} <sup>2</sup></span> --}}
				</div>
				@endif

				<div class="">
					<p class="text-white italic text-center mb-2"><sup>1</sup> The deposit is non-refundable upon cancellation.</p>

					{{-- <p class="text-white italic text-center mb-16"><sup>2</sup> Cost will increase to {{ setting('late_cost') }}/person after {{ setting('camp_deadline') }}.</p> --}}
				</div>

				<x-components::more-info anchor="#guests" color="text-secondary-100" />

			</x-slot>
		</x-components::hero>

		{{-- SPECIAL GUESTS --}}
		<section id="guests" class="bg-worship bg-cover bg-center">
			<row class="">

				{{-- TITLE --}}
				<div class="col-span-full flex justify-center">
					<h2 class="h2 text-white">With Special Guests</h2>
				</div>

				{{-- PASTOR --}}
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
					<x-components::guest img="spkr_JakeConner.jpg" name="Jake Conner" title="Pastor" border="border-white" :socials="[
						'fa-facebook' => [
							'https://www.facebook.com/jake.conner.3517',
							'Follow Jake on Facebook'
						],
						'fa-twitter'=> [
							'https://twitter.com/Jc4Jesus',
							'Follow Jake on Twitter'
						],
						'fa-instagram' => [
							'https://www.instagram.com/jc4jesus/',
							'Follow Jake on Instagram'
						],
					]" />
				</div>

				{{-- WORSHIP --}}
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
					<x-components::guest img="spkr_MicahMariano.jpg" name="Micah Mariano" title="Worship" border="border-white" :socials="[
						'fa-facebook' => [
							'https://www.facebook.com/IAmMicahMariano/',
							'Follow Micha on Facebook'
						],
						'fa-twitter'=> [
							'https://twitter.com/micahmariano',
							'Follow Micha on Twitter'
						],
						'fa-instagram' => [
							'https://www.instagram.com/micahmariano/',
							'Follow Micha on Instagram'
						],
						'fa-safari' => [
							'https://micahmariano.com/',
							'Visit his website'
						]
					]" />
				</div>

				{{-- MAIN --}}
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
					<x-components::guest img="spkr_DaveBenefield.jpg" name="Chalk Artist Dave Benefield" title="Special Event Speaker" border="border-white" :socials="[
						'fa-facebook' => [
							'https://www.facebook.com/dave.benefield.9',
							'Follow Dave on Facebook'
						]
					]" />
				</div>

			</row>
		</section>

		{{-- CAMP --}}
		<x-components::tbe />


		{{-- ACTIVITIES --}}
		<section id="activities" class="bg-activities bg-center bg-no-repeat bg-cover">
			<row class="justify-items-center mobile:!gap-12 tablet:!gap-6">
				{{-- TITLE --}}
				<div class="col-span-full flex flex-col items-center">
					<h2 class="h1 text-yellow-400">Camp Activities</h2>
				</div>

				<div class="col-span-full flex flex-col items-center">
					<h3 class="h2 text-white">The Chair</h3>
				</div>

				<x-components::activity img="activity_chair2.jpg" alt="The Chair: Boat pulled float" />
				<x-components::activity img="activity_chair1.jpg" alt="The Chair: Boat pulled float" />
				<x-components::activity img="activity_chair4.jpg" alt="The Chair: Boat pulled float" />
				<x-components::activity img="activity_chair3.jpg" alt="The Chair: Boat pulled float" />

				<div class="col-span-full flex flex-col items-center mt-6">
					<h3 class="h2 text-white">The Bay</h3>
				</div>

				<x-components::activity img="activity_bay.jpg" alt="Palacious Bay" />
				<x-components::activity img="activity_pier.jpg" alt="Fish the pier" />
				<x-components::activity img="activity_rocks.jpg" alt="Rock Jetty" />
				<x-components::activity img="activity_fishing.jpg" alt="Fish the bay" />
				<x-components::activity img="activity_kayak.jpg" alt="Kayaks & Paddle Boards" />
				<x-components::activity img="activity_canoe.jpg" alt="Canoes" />

				<div class="col-span-full flex flex-col items-center mt-6">
					<h3 class="h2 text-white">Recreation</h3>
				</div>

				{{-- IMAGES --}}
				<x-components::activity img="activity_basketball.jpg" alt="Basketball Courts" />
				<x-components::activity img="activity_billiards.jpg" alt="Billiard Barn" />
				<x-components::activity img="activity_dodgeball.jpg" alt="Dodgeball Courts" />
				<x-components::activity img="activity_gagaball.jpg" alt="Gaga Pits" />
				<x-components::activity img="activity_ninesquare.jpg" alt="Nine Square Courts" />
				<x-components::activity img="activity_pool.jpg" alt="Swimming Pool" />
				<x-components::activity img="activity_inflatables.jpg" alt="Water Inflatables" />

			</row>
		</section>

	</x-slot>

</x-layouts::default>