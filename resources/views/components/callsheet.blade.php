@props(['names'])

@php
	$rowClass = 'w-full grid grid-cols-2 even:bg-white odd:bg-gray-200';
	$headClass = 'font-bold uppercase text-xl p-4 border border-gray-300 bg-primary-300 text-white';
	$cellClass = 'font-bold uppercase text-lg px-4 py-6 border border-gray-300 text-left';
@endphp

<div class="w-full">
	<div class="{{ $rowClass }}">
		<div class="{{ $headClass }}">Camper Name</div>
		<div class="{{ $headClass }}">Church Name</div>
	</div>

	@foreach ($names as $name)
		<button
			class="callsheet-names {{ $rowClass }}"
			data-id={{ $name->id }}
		>
			<div class="{{ $cellClass }}">{{ $name->name }}</div>
			<div class="{{ $cellClass }}">{{ $name->church }}</div>
		</button>
	@endforeach
</div>
