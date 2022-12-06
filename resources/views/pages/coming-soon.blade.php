<x-layouts::default
	class="bg-stage bg-cover bg-no-repeat bg-fixed"
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Coming Soon',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => true
	]">

	<x-slot name="main">
		<row class="justify-items-center items-center">
			<div class="col-span-full p-6 bg-white bg-opacity-80 backdrop-blur-sm mobile:w-full tablet:w-3/4 laptop:w-5/6 text-center rounded-xl shadow-md border border-surface-100 font-semibold">
				<h1 class="font-hero mobile:text-5xl tablet:text-8xl mb-4 text-primary-200 drop-shadow-md tracking-widest">Over the Edge Preteen Camp</h1>

				<div class="font-serif mobile:text-xl tablet:text-3xl font-bold italic mb-8 text-secondary-200">{{ setting('camp_dates') }}</div>

				<p class="mb-4">You're invited to 5 days of faith filled fun, biblically based teaching, and deep worship. Your group will not be disappointed! This year we are only offering one session.</p>

				<p class="mb-4">This camp is for students who have completed<br><strong><em><u>3rd grade - 6th grade</u></em></strong>.</p>

				<p class="mb-4">OTE is now hosted at the <a href="https://www.google.com/maps/place/Texas+Baptist+Encampment/@28.6982326,-96.2124472,17z/data=!3m1!4b1!4m5!3m4!1s0x8641e56eaf47319d:0x1ab87fbd1e84c8e4!8m2!3d28.6982326!4d-96.2102585" title="See on Google Maps" rel="external nofollow noopener" target="_blank" class="text-secondary-100 hover:text-secondary-300">Texas Baptist Encampment in Palacios, TX</a>.</p>

				<p class="mb-4"><strong>Registration coming soon</strong>!!!</p>

			</div>

			<div class="col-span-full p-6 bg-white bg-opacity-80 backdrop-blur-sm mobile:w-full tablet:w-3/4 laptop:w-5/6 text-center rounded-xl shadow-md border border-surface-100 font-semibold">

				<h2 class="font-hero mobile:text-3xl tablet:text-4xl mb-4 text-primary-200 drop-shadow-md tracking-widest w-full">With Special Guests</h2>

				<div class="flex mobile:flex-col tablet:flex-row justify-between items-start gap-8 p-6">

					<div class="mobile:w-full tablet:w-1/2 text-center">
						<img src="{{ asset('images/img_JakeConner.jpg') }}" alt="Jake Conner, Camp Pastor" width="410" height="274" class="rounded-lg shadow mb-6">
						<h3 class="font-serif text-xl mb-1 text-secondary-200 tracking-widest w-full font-black">Jake Conner</h3>
						<div class="font-sans font-bold italic">Pastor</div>

						<div class="flex flex-row flex-nowrap justify-center items-center gap-4 mt-6">
							<a href="https://www.facebook.com/jake.conner.3517" title="Checkout Jake's Facebook page" rel="external nofollow noopener" target="_blank" class="text-social-facebook hover:opacity-50">
								<i class="fa-brands fa-facebook fa-2xl"></i>
							</a>
							<a href="https://twitter.com/Jc4Jesus" title="Checkout Jake's Twitter page" rel="external nofollow noopener" target="_blank" class="text-social-twitter hover:opacity-50">
								<i class="fa-brands fa-twitter fa-2xl"></i>
							</a>
							<a href="https://www.instagram.com/jc4jesus/" title="Checkout Jake's Instagram page" rel="external nofollow noopener" target="_blank" class="text-social-instagram hover:opacity-50">
								<i class="fa-brands fa-instagram fa-2xl"></i>
							</a>
						</div>
					</div>

					<div class="mobile:w-full tablet:w-1/2 text-center">
						<img src="{{ asset('images/img_MicahMariano.jpg') }}" alt="Micah Mariano, Worship Pastor" width="410" height="274" class="rounded-lg shadow mb-6">
						<h3 class="font-serif text-xl mb-1 text-secondary-200 tracking-widest w-full font-black">Micah Mariano</h3>
						<div class="font-sans font-bold italic">Worship</div>

						<div class="flex flex-row flex-nowrap justify-center items-center gap-4 mt-6">
							<a href="https://www.facebook.com/IAmMicahMariano/" title="Check out Micha's Facebook page" rel="external nofollow noopener" target="_blank" class="text-social-facebook hover:opacity-50">
								<i class="fa-brands fa-facebook fa-2xl"></i>
							</a>
							<a href="https://twitter.com/micahmariano" title="Check out Micha's Twitter page" rel="external nofollow noopener" target="_blank" class="text-social-twitter hover:opacity-50">
								<i class="fa-brands fa-twitter fa-2xl"></i>
							</a>
							<a href="https://www.instagram.com/micahmariano/" title="Check out Micha's Instagram page" rel="external nofollow noopener" target="_blank" class="text-social-instagram hover:opacity-50">
								<i class="fa-brands fa-instagram fa-2xl"></i>
							</a>
							<a href="https://micahmariano.com/" title="Checkout Micha's website" rel="external nofollow noopener" target="_blank" class="text-social-website hover:opacity-50">
								<i class="fa-regular fa-globe fa-2xl"></i>
							</a>
						</div>
					</div>

				</div>

			</div>
		</row>
	</x-slot>

</x-layouts::default>