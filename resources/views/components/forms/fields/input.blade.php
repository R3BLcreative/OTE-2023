@props(['class', 'id', 'type', 'placeholder', 'label', 'desc', 'value'])

<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold @error($id) text-accent-alert @enderror">{{ $label }}</label>

	<input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}" class="w-full @error($id) border-accent-alert @enderror">

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id)
	<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
	@enderror
</div>