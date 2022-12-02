<x-layouts::default
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Questions',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

	<x-slot name="main">

		{{-- HERO --}}
		<x-components::hero class="bg-questions bg-cover bg-right" row="items-center">

			{{-- LEFT CONTENT --}}
			<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
				{{-- TITLE --}}
				<div class="">
					<h1 class="h1 !mb-2 text-white">
						Questions?
					</h1>

					<h2 class="h3 drop-shadow-sm">We Have Answers.</h2>
				</div>

				<p class="mobile:text-base tablet:text-lg font-semibold leading-7">Check out our FAQ's below to get answers to our most common questions. Can't find the answer you're looking for? Send us a message using the form at the bottom of this page.</p>
			</x-slot>

			{{-- RIGHT CONTENT --}}
			<x-slot name="rcontent" class="mobile:hidden tablet:order-2">
			</x-slot>
		</x-components::hero>

		{{-- FAQS --}}
		<x-components::faqs />


		{{-- CONTACT FORM --}}
		<x-components::contact />

	</x-slot>

</x-layouts::default>