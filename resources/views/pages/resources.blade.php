<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Resources',
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
					Resources
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7">Everything parents, sponsors, and group leaders need to get/be prepared for camp. As we get closer to camp, new resources will be added. So, be sure to check back here regularly.</p>

				<a href="{{ route('questions') }}" title="Check out our FAQ page" aria-label="Check out our FAQ page" class="btn btn_alt_alt">
					Got Questions?
					<i class="fa-solid fa-comment-question fa-xl"></i>
				</a>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 tablet:hidden laptop:block flex justify-center">
				<img src="{{ asset('images/resources_hero.jpg') }}" alt="An image of two young girls smiling as they enjoy camp" width="800" height="600" class="rounded-lg drop-shadow-md">
			</x-slot>
		</x-components::hero>

		{{-- RESOURCES --}}
		<x-components::resources />

	</x-slot>

</x-layouts::default>