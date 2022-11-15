@props(['class', 'id', 'placeholder', 'label', 'desc', 'value'])



<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold @error($id) text-accent-alert @enderror">{{ $label }}</label>

	<textarea id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" class="w-full @error($id) border-accent-alert @enderror" rows="10">{{ $value ?? '' }}</textarea>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id)
	<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
	@enderror
</div>