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
				<img src="{{ asset('images/logo_campTheme.png') }}" alt="Among Us: OTE 2023 Camp Theme" width="898" height="914" class="rounded-lg mobile:max-w-[300px] tablet:max-w-full">
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="backdrop-blur-sm px-6 py-12 rounded-xl flex flex-col items-center justify-center gap-6">

				{{-- TITLE --}}
				<h1 class="h1 text-secondary-100">
					Among Us
				</h1>

				<p class="mobile:text-base tablet:text-lg text-white font-semibold leading-7 text-center mb-6">Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod.</p>

				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">DATES:</strong>
					<span class="text-white font-semibold">{{ env('OTE_DATES') }}</span>
				</div>
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">COST:</strong>
					<span class="text-white font-semibold">{{ env('OTE_COST') }}/person</span>
				</div>
				<div class="flex flex-row gap-6 items-center justify-between w-full text-xl">
					<strong class="text-secondary-100 font-black">DEPOSIT:</strong>
					<span class="text-white font-semibold">{{ env('OTE_DEPOSIT') }}/person *</span>
				</div>

				<p class="text-white italic text-center mb-16">* The deposit is non-refundable upon cancellation.</p>

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
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 text-center">
					<x-components::guest img="img_JakeConner.jpg" name="Jake Conner" title="Pastor" border="border-white" :socials="[
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
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 text-center">
					<x-components::guest img="img_MicahMariano.jpg" name="Micah Mariano" title="Worship" border="border-white" :socials="[
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

			</row>
		</section>

		{{-- CAMP --}}
		<x-components::tbe />


		{{-- ACTIVITIES --}}
		<section id="activities" class="bg-ducks bg-center">
			<row class="justify-items-center mobile:!gap-12 tablet:!gap-6">
				{{-- TITLE --}}
				<div class="col-span-full flex flex-col items-center">
					<h2 class="h2 text-yellow-400">Camp Activities</h2>
				</div>

				{{-- IMAGES --}}
				<x-components::activity img="basketball.jpg" alt="Basketball Courts" />

				<x-components::activity img="bay.jpg" alt="Palacious Bay" />

				<x-components::activity img="billiards.jpg" alt="Billiard Barn" />

				<x-components::activity img="canoe.jpg" alt="Canoes" />

				<x-components::activity img="chair.jpg" alt="The Chair: Boat pulled float" />

				<x-components::activity img="dodgeball.jpg" alt="Dodgeball Courts" />

				<x-components::activity img="fishing.jpg" alt="Fish the bay" />

				<x-components::activity img="gagaball.jpg" alt="Gaga Pits" />

				<x-components::activity img="ninesquare.jpg" alt="Nine Square Courts" />

				<x-components::activity img="pier.jpg" alt="Fish the pier" />

				<x-components::activity img="pool.jpg" alt="Swimming Pool" />

				<x-components::activity img="rocks.jpg" alt="Rock Jetty" />

			</row>
		</section>

	</x-slot>

</x-layouts::default>