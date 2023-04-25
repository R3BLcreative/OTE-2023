<x-layouts::default class="bg-black" :seo="[
	'metaTitle' => 'OTE Prize Callsheet',
	'metaDescription' => '',
	'preventIndexing' => true
	]">

	<x-slot name="main">

		<section id="hero" class="!pb-10">
			<row>
				<div class="col-span-full">
					<h1 class="h1 text-secondary-100 text-center mb-4">
						OTE Prize Callsheet
					</h1>
					<p class="text-white text-center">To generate a callsheet, simply fill out the form below and click submit.</p>
					<p class="text-white text-center">The form will be replaced by a list of randomly selected names.</p>
					<p class="text-white text-center">As you call the names, click/tap the name to remove it from the list.</p>
				</div>
			</row>
			<row class="!py-0">
				<div class="col-span-full flex flex-col items-center justify-start">
					<div class="bg-white mobile:w-full laptop:w-3/4 rounded-lg p-6">
						@empty($names)
							<x-forms::callsheet />
						@else
							<x-components::callsheet :names="$names" />
						@endempty
					</div>

					@if (!empty($names))
						<div class="w-full flex items-center justify-center mt-10">
							<a href="{{ route('callsheet') }}" class="btn btn_alt w-fit flex items-center justify-center">
								Start Over
								<i class="fa-duotone fa-rotate"></i>
							</a>
						</div>
					@endif
				</div>
			</row>
		</section>

	</x-slot>

</x-layouts::default>