@props([
'class',
'id',
'label',
'desc',
'options',
'required',
'cols',
'details',
'detailsMax'
])

<div class="{{ $class }} flex flex-col gap-4" @isset($details) data-hasDeps="1" @endisset>
	<div class="">
		<label for="{{ $id }}" class="block font-bold @error($id) text-accent-alert @enderror">{{ $label }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

		@isset($desc)
		<span class="text-sm italic">{{ $desc }}</span>
		@endisset

		@error($id)
		<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
		@enderror
	</div>

	@php
	$i = 1;
	$grid = [
	'grid grid-cols-1',
	'grid grid-cols-1',
	'grid grid-cols-2',
	'grid grid-cols-3',
	'grid grid-cols-4'
	];
	@endphp
	<div class="{{ $grid[$cols] ?? 'grid grid-cols-1' }} gap-4 items-start">
		@foreach($options as $optval => $option)
		<div class="flex flex-row items-center justify-start gap-4">
			<input type="checkbox" value="{{ $optval }}" id="{{ $id }}_choice_{{ $i }}" name="{{ $id }}_choice_{{ $i }}" class="cursor-pointer" @isset($details)aria-expanded="false" aria-controls="{{ $id }}-details-wrap" data-deps="" @endisset @if(old($id.'_choice_'.$i))checked="checked" @endif>
			<label for="{{ $id }}_choice_{{ $i }}" class="cursor-pointer">{{ $option }}</label>
		</div>
		@php
		$i++;
		@endphp
		@endforeach
	</div>

	@isset($details)
	<div id="{{ $id }}-details-wrap" class="flex flex-col gap-4 w-full max-h-0 opacity-0 transition-all ease-in-out duration-500 overflow-hidden" aria-expanded="false">
		<div class="">
			<label for="{{ $id }}-details" class="block font-bold @error($id.'-details') text-accent-alert @enderror">Explanation <span class="text-red-700 font-black">*</span></label>
			<span class="text-sm italic">
				Please explain your selections above.
			</span>
		</div>
		<textarea id="{{ $id }}-details" name="{{ $id }}-details" placeholder="Explain here..." class="w-full @error($id.'-details') border-accent-alert @enderror" rows="4" @isset ($detailsMax)data-max="{{ $detailsMax }}" data-counter="{{ $id }}-details-counter" @endisset>{{ old($id.'-details') }}</textarea>
		@isset($detailsMax)
		<div class="flex flex-row justify-end">
			<span id="{{ $id }}-details-counter" class="text-xs text-body-50 italic font-semibold">0/{{ $detailsMax }}</span>
		</div>
		@endisset
	</div>
	@endisset
</div>