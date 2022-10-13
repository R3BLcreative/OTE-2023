@props(['route', 'link'])

@php
$isActive = request()->routeIs($route);
@endphp

<li {{ $attributes->merge(['class' => '']) }}>
	<a
		href="{{ route($route) }}"
		@class(['text-primary-100'=> $isActive,
		'text-black' => !$isActive,
		'font-black',
		'transition-all',
		'ease-in-out',
		'uppercase',
		'text-lg',
		'tracking-widest',
		'hover:text-primary-100' => !$isActive,
		'hover:text-black' => $isActive
		])
		title="{{ $link->attributes->get('title') }}"
		aria-label="{{ $link->attributes->get('title') }}"
		>

		{{ $link }}
	</a>
</li>