@props(['class', 'id', 'placeholder', 'label', 'desc', 'value', 'options', 'required'])

<div class="{{ $class }}">
	<label for="{{ $id }}" class="block mb-2 font-bold @error($id) text-accent-alert @enderror">{{ $label }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

	<select id="{{ $id }}" name="{{ $id }}" class="w-full @error($id) border-accent-alert @enderror">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder }}</option>
		@foreach ($options as $option)
		<option value="{{ $option }}" @if($value==$option) selected @endif>{{ $option }}</option>
		@endforeach
	</select>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id)
	<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
	@enderror
</div>