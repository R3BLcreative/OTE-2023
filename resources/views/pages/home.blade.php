<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Home',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-pool bg-cover bg-center bg-no-repeat" row="">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent"></x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6">

				{{-- TITLE --}}
				<h1 class="h1 text-yellow-400">
					This Is Your Summer
				</h1>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7">Over the Edge Preteen Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.</p>

				<a href="{{ route('camp') }}" title="Get more info about this year's camp." aria-label="More info about camp" class="btn btn_secondary flex flex-row items-center gap-3 w-fit">
					2023 Camp Details
					<i class="fa-solid fa-angles-right fa-xs"></i>
				</a>
			</x-slot>
		</x-components::hero>

		{{-- TESTIMONIALS --}}

		{{-- CAMP --}}
		<x-components::tbe />
	</x-slot>

</x-layouts::default>