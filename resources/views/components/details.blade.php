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