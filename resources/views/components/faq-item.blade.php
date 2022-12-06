@props(['question', 'answer'])

<div class="faq-item card one relative">
	<a href="#" class="question flex flex-row flex-nowrap items-center justify-between gap-6 relative" aria-expanded="false">
		<i class="fa-duotone fa-square-question fa-3x" style="--fa-secondary-color:#e6b517;"></i>

		<h2 class="font-serif font-semibold mobile:text-base tablet:text-2xl mb-0 w-4/5 text-left">
			{{ $question }}
		</h2>

		<div class="fa-stack">
			<i class="fa-solid fa-plus fa-xl fa-stack-1x"></i>
			<i class="fa-solid fa-minus fa-xl fa-stack-1x"></i>
		</div>
	</a>

	<div class="answer" aria-expanded="false">
		<hr class="my-6">
		<div class="flex flex-col gap-6 px-8">{{ $answer }}</div>
	</div>
</div>