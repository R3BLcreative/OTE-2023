@props(['class', 'id', 'type', 'placeholder', 'label', 'desc', 'value'])

<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold">{{ $label }}</label>

	<input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}" class="w-full">

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset
</div>