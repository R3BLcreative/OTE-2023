<section id="reg-step-one" class="">
	<row class="items-center">

		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 flex flex-col items-center justify-center">
			<img src="{{ asset('images/register_step1.jpg') }}" alt="A group of campers getting ready for worship" width="852" height="602" class="rounded shadow border-2 border-white">
		</div>

		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 flex flex-col items-start gap-8">

			<div>
				<span class="text-2xl text-body-50 font-serif font-semibold">STEP 1</span>
				<h2 class="h2 mobile:!4xl tablet:!text-5xl !drop-shadow-sm text-yellow-500">Group Registration</h2>
			</div>

			<p class="font-semibold">You or your group leader needs to register the church, group, or family for camp. Having your group details allows us to make sure all your sponsors and campers are assigned to your group and we have your numbers correct for camp.</p>

			<a href="{{ route('registration.group') }}" title="Start the registration process" aria-label="Start the registration process" class="btn btn_primary">
				Get Started
				<i class="fa-duotone fa-arrow-right-to-arc fa-xl"></i>
			</a>
		</div>
	</row>
</section>