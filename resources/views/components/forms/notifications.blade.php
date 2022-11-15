@if ($errors->any())
<div class="w-full rounded-lg mb-6 bg-red-200 text-red-700 border-2 border-red-400 p-3 leading-normal">
	<p class="font-semibold mb-12px">There are errors with your form submission. Please check the highlighted fields below.</p>
</div>
@endif

@if (session()->has('message'))
<div
	class="w-full rounded-lg bg-green-200 text-green-700 border-2 border-green-400 p-3 leading-normal font-semibold mb-6">
	<p class="">
		{{ session()->get('message') }}
	</p>
</div>
@endif