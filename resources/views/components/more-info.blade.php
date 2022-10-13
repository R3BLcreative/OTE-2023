@props(['anchor', 'color'])

<div class="col-span-full justify-self-center">
	<a href="{{ $anchor }}" class="w-fit flex flex-col items-center justify-center gap-2 animate-bounce hover:animate-none uppercase font-bold {{ $color }}">
		More Info
		<i class="fa-solid fa-arrow-down-to-line"></i>
	</a>
</div>