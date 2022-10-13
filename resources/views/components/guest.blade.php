@props(['img', 'name', 'title', 'socials', 'border'])

{{-- IMAGE --}}
<img src="{{ asset('images/'.$img) }}" alt="{{ $name.', '.$title }}" width="410" height="274" class="rounded-lg drop-shadow-md mb-6 mx-auto border-2 {{ $border }}">

{{-- NAME --}}
<h3 class="h3 text-white">{{ $name }}</h3>

{{-- TITLE --}}
<span class="font-sans font-bold italic text-white">{{ $title }}</span>

@if (count($socials) > 0)
{{-- SOCIAL --}}
<div class="flex flex-row flex-nowrap justify-center items-center gap-4 mt-6">
	@foreach ($socials as $icon => $social)
	<a href="{{ $social[0] }}" title="{{ $social[1] }}" rel="external nofollow noopener" target="_blank" class="opacity-50 text-white transform transition-all duration-200 hover:opacity-100 hover:scale-125">
		<i class="fa-brands {{ $icon }} fa-2xl"></i>
	</a>
	@endforeach
</div>
@endif