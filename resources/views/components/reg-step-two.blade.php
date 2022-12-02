<section id="reg-step-one" class="text-white bg-body-100">
	<row class="">

		<div class="col-span-full">
			<span class="text-2xl text-body-50 font-serif font-semibold">STEP 2</span>
			<h2 class="h2 mobile:!text-4xl tablet:!text-5xl !drop-shadow-sm text-yellow-500">Deposit</h2>
		</div>

		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 flex flex-col gap-8">
			<p class="font-semibold">To complete your group registration and ensure your registration is locked in, you will need to send in your deposit <strong>({{ env('OTE_DEPOSIT') }}/person)</strong> to the address listed. <strong>This deposit is non-refundable upon cancellation and will be applied to your final balance for camp.</strong></p>

			<p class="font-semibold">Deposit amount and additional details will be included in the email you receive after you register your group in step 1.</p>

			<p class="font-semibold">Adult sponsors and child campers can begin registering prior to deposit payment.</p>
		</div>

		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-6 flex flex-col items-center justify-start">
			<div class="pl-12 pr-28 py-12 bg-white rounded-lg shadow-lg border border-body-50 relative">
				<img src="{{ asset('images/register_stamp.png') }}" alt="An image of a postage stamp" width="218" height="265" class="w-[60px] absolute top-2 right-2">

				<h3 class="h3 mb-4 mobile:text-xl tablet:text-3xl text-yellow-500">Send Payments To:</h3>
				<p class="mobile:text-base tablet:text-xl text-body-100 leading-8">
					<strong>Over the Edge Preteen Camp</strong><br>
					4100 North Laurent<br>
					Victoria, TX 77901
				</p>
			</div>
		</div>
	</row>
</section>