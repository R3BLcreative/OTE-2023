@props(['class', 'id', 'type', 'placeholder', 'label', 'desc', 'value', 'required', 'slots', 'accepts'])

<div @isset($class)class="{{ $class }}" @endisset>
	<label for="{{ $id }}" class="block mb-2 font-bold @empty($label) invisible @endempty @error($id) text-accent-alert @enderror">{{ $label ?? $desc }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

	<input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" @isset($placeholder)placeholder="{{ $placeholder }}" @endisset value="{{ $value ?? '' }}" class="w-full @error($id) border-accent-alert @enderror" @isset($slots)data-slots="{{ $slots }}" @endisset @isset($accepts)data-accepts="{{ $accepts }}" @endisset>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id)
	<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
	@enderror
</div>