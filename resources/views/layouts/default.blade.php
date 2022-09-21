@props(['seo'])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- SEO OpenGraph and Meta --}}
	@if($seo['preventIndexing'] === false)
	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	@else
	<meta name="robots" content="noindex, nofollow">
	@endif

	<title>{{ $seo['metaTitle'] }}</title>

	<link rel="canonical" href="{{ request()->url() }}">

	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ $seo['metaTitle'] }}">
	<meta property="og:description" content="{{ $seo['metaDescription'] }}">
	<meta property="og:url" content="{{ request()->url() }}">
	<meta property="og:site_name" content="Over the Edge Preteen Camp">
	<meta property="article:publisher" content="https://www.facebook.com/">
	<meta property="article:modified_time" content="">
	<meta property="og:image" content="">
	<meta property="og:image:width" content="">
	<meta property="og:image:height" content="">
	<meta property="og:image:type" content="">
	{{-- END SEO OpenGraph and Meta --}}

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

	<link rel="icon" type="image/x-icon" href="/favicon.ico">

	<!-- Scripts & Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body {{ $attributes->merge(['class' => '']) }}>

	<button tabindex="0" class="block h-none w-none fixed top-12 overflow-hidden font-semibold bg-primary-100 text-white rounded-md px-24 focus:h-fit focus:w-fit focus:z-[9999]" onclick="document.location+='#content';return false;">Skip to main content</button>

	{{-- HEADER --}}
	<x-components::header />

	{{-- MAIN CONTENT --}}
	<main id="content" tabindex="-1" role="main" aria-label="Main Content" class="bg-white mt-[90px] z-30">

		{{ $main }}

	</main>

	{{-- FOOTER --}}
	<x-components::footer />

</body>

</html>