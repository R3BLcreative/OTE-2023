<x-components::hero class="bg-ote bg-cover bg-center bg-no-repeat" row="items-center">
	{{-- LEFT CONTENT --}}
	<x-slot name="lcontent" class="mobile:bg-white mobile:bg-opacity-40 mobile:backdrop-blur tablet:bg-transparent tablet:backdrop-blur-lg p-4 rounded-xl flex flex-col gap-6 mobile:order-2 tablet:order-1">
		{{-- TITLE --}}
		<h1 class="h1 text-secondary-100">
			Until Next Year...
		</h1>

		<p class="mobile:text-base tablet:text-lg font-semibold leading-7 text-white"><strong>THANK YOU</strong> for another amazing year of camp!!! We hope that your time with us was blessed with great memories and new friendships. We hope to see you again next year.</p>
		<p class="mobile:text-base tablet:text-lg font-semibold leading-7 text-white">Details for our 2024 camp will be published soon.</p>
	</x-slot>

	{{-- RIGHT CONTENT --}}
	<x-slot name="rcontent" class="mobile:order-1 tablet:order-2 tablet:hidden laptop:block flex justify-center">
		<img src="{{ asset('images/resources_hero.jpg') }}" alt="An image of two young girls smiling as they enjoy camp" width="800" height="600" class="rounded-lg drop-shadow-md">
	</x-slot>
</x-components::hero>