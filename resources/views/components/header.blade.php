<header class="w-full bg-white shadow border-b border-b-gray-300 sticky top-0 z-50" aria-label="Global Site Header">
	<row {{ $attributes->merge(['class' => 'items-center relative']) }} style="padding-top:10px; padding-bottom:10px;">

		{{-- LOGO --}}
		<div class="mobile:col-span-2 tablet:col-span-2 laptop:col-span-2">
			<a href="{{  route('home') }}" title="Back to site home page" aria-label="Back to site home page" class="">
				<img src="{{ asset('images/logo_blue.png') }}" alt="Over the Edge Preteen Camp" width="240" height="131">
			</a>
		</div>

		{{-- MENU --}}
		<nav id="main-nav" class="burger-menu" aria-expanded="false" aria-label="Main Site Navigation">
			<ul class="flex mobile:flex-col mobile:gap-8 mobile:justify-start mobile:items-center mobile:w-full laptop:flex-row laptop:gap-8 laptop:justify-end laptop:items-center laptop:w-fit">
				{{-- <x-components::main-nav-item class="" route="camp">
					<x-slot name="link" title="Camp 2023 Details">Camp 2023</x-slot>
				</x-components::main-nav-item> --}}

				<x-components::main-nav-item class="" route="resources">
					<x-slot name="link" title="Camp Resources">Resources</x-slot>
				</x-components::main-nav-item>

				{{-- <x-components::main-nav-item class="" route="about">
					<x-slot name="link" title="About OTE">About</x-slot>
				</x-components::main-nav-item> --}}

				<x-components::main-nav-item class="" route="questions">
					<x-slot name="link" title="Got questions? Get answers!">Questions</x-slot>
				</x-components::main-nav-item>

				<li>
					<a href="{{ route('registration') }}" title="How to register for camp" aria-label="How to register for camp" class="btn btn_primary !animate-none flex items-center gap-3">
						Register
						<span class="flex relative">
							<i class="fa-solid fa-clipboard-check animate-ping absolute inline-flex opacity-75"></i>
							<i class="fa-solid fa-clipboard-check relative inline-flex"></i>
						</span>
					</a>
				</li>
			</ul>
		</nav>

		{{-- HAMBURGER --}}
		<div class="mobile:col-span-2 tablet:col-span-6 laptop:hidden w-full flex justify-end">
			<button class="burger-toggle" aria-expanded="false" aria-controls="main-nav">
				<i class="fa-solid fa-bars burger-lines fa-xl text-black"></i>
				<i class="fa-solid fa-xmark burger-close fa-xl text-black"></i>
			</button>
		</div>

	</row>
</header>