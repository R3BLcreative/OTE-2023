@props(['gooseEgg' => false])

<x-layouts::default
	class="bg-black"
	:seo="[
	    'metaTitle' => 'OTE Prize Callsheet',
	    'metaDescription' => '',
	    'preventIndexing' => true,
	]"
>

	<x-slot name="main">

		<section
			class="!pb-10"
			id="hero"
		>
			<row>
				<div class="col-span-full">
					<h1 class="h1 mb-4 text-center text-secondary-100">
						OTE Prize Callsheet
					</h1>

					@empty($names)
						<p class="text-center text-white">To generate a callsheet, simply fill out the form below and click submit.</p>
						<p class="text-center text-white">The form will be replaced by a list of randomly selected names.</p>
					@else
						<p class="text-center text-white">As you call the names, click or tap the name's row to remove it from the list.</p>
					@endempty

				</div>
			</row>
			<row class="!py-0">
				<div class="col-span-full flex flex-col items-center justify-start">
					<div class="rounded-lg bg-white p-6 mobile:w-full laptop:w-3/4">
						@empty($names)
							<x-forms::callsheet :gooseEgg="$gooseEgg" />
						@else
							<x-components::callsheet :names="$names" />
						@endempty
					</div>

					@if (!empty($names))
						<div class="mt-10 flex w-full items-center justify-center">
							<a
								class="btn btn_alt flex w-fit items-center justify-center"
								href="{{ route('callsheet') }}"
							>
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
