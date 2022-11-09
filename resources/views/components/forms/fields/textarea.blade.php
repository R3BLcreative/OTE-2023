@props(['class', 'id', 'placeholder', 'label', 'desc', 'value'])

<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold">{{ $label }}</label>

	<textarea id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}" class="w-full" rows="10"></textarea>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset
</div>