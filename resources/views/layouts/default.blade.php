@props(['seo', 'main'])

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
	<link rel="preconnect" href="https://kit.fontawesome.com">

	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Bitter:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

	{{-- FAV/SHORTCUT ICONS --}}
	<link rel="shortcut icon" href="/ote_favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/ote_apple.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/ote_apple2.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/ote_apple3.png">
	<link rel="apple-touch-icon" sizes="167x167" href="/ote_apple4.png">

	<!-- Scripts & Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<script src="https://kit.fontawesome.com/743b4f4183.js" crossorigin="anonymous"></script>
</head>

<body {{ $attributes->merge(['class' => 'font-sans font-normal text-body-100 mobile:text-md laptop:text-base tracking-wide antialiased']) }}>

	<button tabindex="0" class="block h-0 w-0 fixed top-12 overflow-hidden font-semibold text-black rounded-md px-24 focus:h-fit focus:w-fit focus:z-[9999] bg-white" onclick="document.location+='#content';return false;">Skip to main content</button>

	{{-- HEADER --}}
	@if (!request()->routeIs('coming-soon'))
	<x-components::header />
	@endif

	{{-- MAIN CONTENT --}}
	<main id="content" tabindex="-1" role="main" aria-label="Main Content" class="w-full relative">
		{{ $main }}
	</main>

	{{-- FOOTER --}}
	@if (!request()->routeIs('coming-soon'))
	<x-components::footer />
	@endif

</body>

</html>