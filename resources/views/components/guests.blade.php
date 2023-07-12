<section id="guests" class="bg-worship bg-cover bg-center">
	<row class="">

		{{-- TITLE --}}
		<div class="col-span-full flex justify-center">
			<h2 class="h2 text-white">With Special Guests</h2>
		</div>

		{{-- PASTOR --}}
		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
			<x-components::guest img="spkr_JakeConner.jpg" name="Jake Conner" title="Pastor" border="border-white" :socials="[
				'fa-facebook' => [
					'https://www.facebook.com/jake.conner.3517',
					'Follow Jake on Facebook'
				],
				'fa-twitter'=> [
					'https://twitter.com/Jc4Jesus',
					'Follow Jake on Twitter'
				],
				'fa-instagram' => [
					'https://www.instagram.com/jc4jesus/',
					'Follow Jake on Instagram'
				],
			]" />
		</div>

		{{-- WORSHIP --}}
		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
			<x-components::guest img="spkr_MicahMariano.jpg" name="Micah Mariano" title="Worship" border="border-white" :socials="[
				'fa-facebook' => [
					'https://www.facebook.com/IAmMicahMariano/',
					'Follow Micha on Facebook'
				],
				'fa-twitter'=> [
					'https://twitter.com/micahmariano',
					'Follow Micha on Twitter'
				],
				'fa-instagram' => [
					'https://www.instagram.com/micahmariano/',
					'Follow Micha on Instagram'
				],
				'fa-safari' => [
					'https://micahmariano.com/',
					'Visit his website'
				]
			]" />
		</div>

		{{-- MAIN --}}
		<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 text-center">
			<x-components::guest img="spkr_DaveBenefield.jpg" name="Chalk Artist Dave Benefield" title="Special Event Speaker" border="border-white" :socials="[
				'fa-facebook' => [
					'https://www.facebook.com/dave.benefield.9',
					'Follow Dave on Facebook'
				]
			]" />
		</div>

	</row>
</section>