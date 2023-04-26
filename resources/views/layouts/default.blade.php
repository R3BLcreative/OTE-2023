@props(['seo', 'main'])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>

	{{-- SEO OpenGraph and Meta --}}
	@if ($seo['preventIndexing'] === false)
		<meta
			name="robots"
			content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"
		>
	@else
		<meta
			name="robots"
			content="noindex, nofollow"
		>
	@endif

	<title>{{ $seo['metaTitle'] }}</title>

	<link
		href="{{ request()->url() }}"
		rel="canonical"
	>

	<meta
		property="og:locale"
		content="en_US"
	>
	<meta
		property="og:type"
		content="website"
	>
	<meta
		property="og:title"
		content="{{ $seo['metaTitle'] }}"
	>
	<meta
		property="og:description"
		content="{{ $seo['metaDescription'] }}"
	>
	<meta
		property="og:url"
		content="{{ request()->url() }}"
	>
	<meta
		property="og:site_name"
		content="Over the Edge Preteen Camp"
	>
	<meta
		property="article:publisher"
		content="https://www.facebook.com/"
	>
	<meta
		property="article:modified_time"
		content=""
	>
	<meta
		property="og:image"
		content=""
	>
	<meta
		property="og:image:width"
		content=""
	>
	<meta
		property="og:image:height"
		content=""
	>
	<meta
		property="og:image:type"
		content=""
	>
	{{-- END SEO OpenGraph and Meta --}}

	<link
		href="https://fonts.googleapis.com"
		rel="preconnect"
	>
	<link
		href="https://fonts.gstatic.com"
		rel="preconnect"
		crossorigin
	>
	<link
		href="https://kit.fontawesome.com"
		rel="preconnect"
	>

	<link
		href="https://fonts.googleapis.com/css2?family=Bangers&family=Bitter:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
		rel="stylesheet"
	>

	{{-- FAV/SHORTCUT ICONS --}}
	<link
		type="image/x-icon"
		href="/ote_favicon.png"
		rel="shortcut icon"
	>
	<link
		href="/ote_apple.png"
		rel="apple-touch-icon"
	>
	<link
		href="/ote_apple2.png"
		rel="apple-touch-icon"
		sizes="180x180"
	>
	<link
		href="/ote_apple3.png"
		rel="apple-touch-icon"
		sizes="152x152"
	>
	<link
		href="/ote_apple4.png"
		rel="apple-touch-icon"
		sizes="167x167"
	>

	<!-- Scripts & Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<script
		src="https://kit.fontawesome.com/743b4f4183.js"
		crossorigin="anonymous"
	></script>
</head>

<body
	{{ $attributes->merge(['class' => 'font-sans font-normal text-body-100 mobile:text-md laptop:text-base tracking-wide antialiased']) }}
>

	<button
		class="fixed top-12 block h-0 w-0 overflow-hidden rounded-md bg-white px-24 font-semibold text-black focus:z-[9999] focus:h-fit focus:w-fit"
		tabindex="0"
		onclick="document.location+='#content';return false;"
	>Skip to main content</button>

	{{-- HEADER --}}
	@if (!request()->routeIs('coming-soon') && !request()->routeIs('callsheet') && !request()->routeIs('callsheet.list'))
		<x-components::header />
	@endif

	{{-- MAIN CONTENT --}}
	<main
		class="relative w-full"
		id="content"
		role="main"
		aria-label="Main Content"
		tabindex="-1"
	>
		{{ $main }}
	</main>

	{{-- FOOTER --}}
	@if (!request()->routeIs('coming-soon') && !request()->routeIs('callsheet') && !request()->routeIs('callsheet.list'))
		<x-components::footer />
	@endif

</body>

</html>
