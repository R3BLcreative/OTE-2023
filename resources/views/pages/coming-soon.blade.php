<x-layouts::default
	:showNav=false
	:seo="[
	'metaTitle' => 'Over the Edge Preteen Camp || Coming Soon',
	'metaDescription' => 'OTE Camp is a 5 day faith based Christian summer camp for students who have completed 3rd - 6th grade. Hosted at Texas Baptist Encampment in Palacious, TX.',
	'preventIndexing' => false
	]">

<x-slot name="main">
	{{-- THANKS - HERO --}}
	<x-components::thanks />

	{{-- DETAILS - HERO --}}
	{{-- <x-components::details /> --}}

	{{-- GUESTS --}}
	{{-- <x-components::guests /> --}}

	{{-- CAMP --}}
	<x-components::tbe />

	{{-- ACTIVITIES --}}
	{{-- <x-components::activities /> --}}

</x-slot>

</x-layouts::default>