@props(['gooseEgg'])

<form
	class="flex flex-col gap-6"
	action="{{ route('callsheet.list') }}"
	method="post"
	enctype="multipart/form-data"
	novalidate
>
	@csrf
	@method('post')

	<h2 class="h2 border-b border-b-gray-700 text-center text-primary-50 drop-shadow-none">Callsheet Builder</h2>

	@if ($gooseEgg)
		<div class="flex w-full flex-col rounded-lg bg-black p-4 text-center text-secondary-100">
			<span class="text-xl font-bold">
				Goose Egg... Your request returned 0 results
			</span>
			<span class="mt-4 block text-sm italic">
				Don't worry! Everything is working the way is should. You just need more time for sponsors to submit names.
			</span>
		</div>
	@endif

	<h3 class="h3 mt-6 block w-full border-b text-red-600">STEP 1</h3>
	<div class="flex flex-col gap-2">
		<label
			class="@error('type') text-red-700 @enderror font-bold"
			for="type"
		>
			What prize category are you calling? <span class="text-red-700">*</span>
		</label>
		<select
			class="@error('type') border-red-700 @enderror w-full"
			id="type"
			name="type"
			required
		>
			<option
				value="-1"
				disabled
				selected
			>Select a prize category</option>
			<option value="mega">Mega Challenge</option>
			<option value="ducky">Rubber Ducky</option>
		</select>
		@error('type')
			<span class="text-sm font-semibold italic text-red-700">{{ $message }}</span>
		@enderror
	</div>

	<h3 class="h3 mt-6 block w-full border-b text-blue-600">STEP 2</h3>
	<div class="flex flex-col gap-2">
		<label
			class="@error('count') text-red-700 @enderror font-bold"
			for="count"
		>
			How many names would you like to call? <span class="text-red-700">*</span>
		</label>
		<input
			class="@error('count') border-red-700 @enderror w-full"
			id="count"
			name="count"
			type="number"
			placeholder="Enter a number"
			required
		/>
		@error('count')
			<span class="text-sm font-semibold italic text-red-700">{{ $message }}</span>
		@enderror
	</div>

	<h3 class="h3 mt-6 block w-full border-b text-green-600">STEP 3</h3>
	<div class="flex flex-col gap-2">
		<label
			class="@error('eoc') text-red-700 @enderror font-bold"
			for="eoc"
		>
			Is this for the last day of prizes? <span class="text-red-700">*</span>
		</label>
		<select
			class="@error('eoc') border-red-700 @enderror w-full"
			id="eoc"
			name="eoc"
			required
		>
			<option value="yes">Yes</option>
			<option
				value="no"
				selected
			>No</option>
		</select>
		@error('eoc')
			<span class="text-sm font-semibold italic text-red-700">{{ $message }}</span>
		@enderror
	</div>

	<h3 class="h3 mt-6 block w-full border-b text-orange-600">STEP 4</h3>
	<div class="flex flex-col gap-2">
		<label class="font-bold">
			Click submit to generate the callsheet
		</label>
		<button
			class="btn btn_alt flex w-full items-center justify-center"
			type="submit"
		>
			Submit
			<i class="fa-duotone fa-shuffle"></i>
		</button>
	</div>
</form>
