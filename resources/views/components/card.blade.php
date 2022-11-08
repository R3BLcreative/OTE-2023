@props(['layout'])

@php
$layouts = [
'col-span-full',
'col-span-full',
'mobile:col-span-full tablet:col-span-4 laptop:col-span-6',
'mobile:col-span-full tablet:col-span-4 laptop:col-span-4',
'mobile:col-span-full tablet:col-span-4 laptop:col-span-3',
];
$class = $layouts[$layout];
@endphp

<div class="rounded-md shadow-lg bg-white p-6 border border-surface-100 text-center grid grid-rows-4 gap-6 items-center justify-items-center {{ $class }}">

	{{ $graphic }}

	<h3 class="h3 uppercase">{{ $title }}</h3>

	<p class="">{{ $text }}</p>

	{{ $cta }}

</div>