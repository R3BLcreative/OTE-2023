<form action="" method="post" enctype="multipart/form-data" novalidate class="flex flex-col gap-6">
	@csrf
	@method('post')

	<h2 class="h2 text-primary-50 text-center drop-shadow-none border-b border-b-gray-700">Callsheet Builder</h2>

	<h3 class="h3 block w-full border-b text-red-600 mt-6">STEP 1</h3>
	<div class="flex flex-col gap-2">
		<label for="category" class="font-bold">
			What prize category are you calling? <span class="text-red-500">*</span>
		</label>
		<select id="category" name="category" class="w-full" required>
			<option value="-1" disabled selected>Select a prize category</option>
			<option value="mega">Mega Challenge</option>
			<option value="mega">Ruber Ducky</option>
		</select>
	</div>

	<h3 class="h3 block w-full border-b text-blue-600 mt-6">STEP 2</h3>
	<div class="flex flex-col gap-2">
		<label for="count" class="font-bold">
			How many names would you like to call? <span class="text-red-500">*</span>
		</label>
		<input type="number" id="count" name="count" placeholder="Enter a number" class="w-full" required />
	</div>

	<h3 class="h3 block w-full border-b text-green-600 mt-6">STEP 3</h3>
	<div class="flex flex-col gap-2">
		<label for="eoc" class="font-bold">
			Is this for the last day of prizes? <span class="text-red-500">*</span>
		</label>
		<select id="eoc" name="eoc" class="w-full" required>
			<option value="yes">Yes</option>
			<option value="no" selected>No</option>
		</select>
	</div>

	<h3 class="h3 block w-full border-b text-orange-600 mt-6">STEP 4</h3>
	<div class="flex flex-col gap-2">
		<label class="font-bold">
			Click submit to generate the callsheet
		</label>
		<button type="submit" class="btn btn_alt w-full flex items-center justify-center">
			Submit
			<i class="fa-duotone fa-shuffle"></i>
		</button>
	</div>
</form>