@props(['img', 'alt'])

<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3">
	<img src="{{ asset('images/'.$img) }}" alt="{{ $alt }}" width="346" height="241" class="rounded-md drop-shadow-lg border-2 border-white transform transition-all duration-300 ease-in-out relative z-20 hover:z-30 hover:scale-125">
</div>