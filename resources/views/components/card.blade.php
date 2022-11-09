@props(['layout'])

@php
$layouts = [
'one',
'one',
'two',
'three',
'four',
];
$class = $layouts[$layout];
@endphp

<div class="card text-center grid grid-rows-4 gap-6 items-center justify-items-center {{ $class }}">

	{{ $graphic ?? '' }}

	<h3 class="h3 uppercase">{{ $title }}</h3>

	<p class="">{{ $text }}</p>

	{{ $cta ?? '' }}

</div>