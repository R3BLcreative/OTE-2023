@props(['link'])

<li {{ $attributes->merge(['class' => 'transition-all ease-in-out hover:text-opacity-50']) }}>
	<a
		href="{{ $link->attributes->get('href') }}"
		title="{{ $link->attributes->get('title') }}"
		aria-label="{{ $link->attributes->get('title') }}"
		target="_blank">

		<i class="fa-brands {{ $link->attributes->get('icon') }} fa-xl"></i>
	</a>
</li>