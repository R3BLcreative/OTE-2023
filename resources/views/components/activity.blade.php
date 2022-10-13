@props(['img', 'alt'])

<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3">
	<img src="{{ asset('images/'.$img) }}" alt="{{ $alt }}" width="346" height="241" class="rounded-md drop-shadow-lg border-2 border-white transform transition-all saturate-0 duration-300 ease-in-out hover:scale-125 hover:saturate-100">
</div>