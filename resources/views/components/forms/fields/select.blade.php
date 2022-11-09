@props(['class', 'id', 'placeholder', 'label', 'desc', 'value', 'options'])

<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold">{{ $label }}</label>

	<select id="{{ $id }}" name="{{ $id }}" class="w-full">
		<option value="" disabled selected>{{ $placeholder }}</option>
		@foreach ($options as $option)
		<option value="{{ $option }}">{{ $option }}</option>
		@endforeach
	</select>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset
</div>