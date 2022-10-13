@props(['row', 'lcontent','rcontent'])

<section id="hero" {{ $attributes->merge(['class' => 'laptop:min-h-[500px]']) }}>
	<row class="{{ $row }}">

		{{-- LEFT CONTENT --}}
		<div {{ $lcontent->attributes->merge(['class' => 'mobile:col-span-full tablet:col-span-4 laptop:col-span-6 w-full']) }}>
			{{ $lcontent }}
		</div>

		{{-- RIGHT CONTENT --}}
		<div {{ $rcontent->attributes->merge(['class' => 'mobile:col-span-full tablet:col-span-4 laptop:col-span-6 w-full']) }}>
			{{ $rcontent }}
		</div>
	</row>
</section>