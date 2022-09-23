/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./resources/views/**/*.blade.php',
		'./app/Http/Controllers/**/*.php',
	],
	theme: {
		screens: {
			mobile: '0px',
			tablet: '767px',
			laptop: '991px',
			desktop: '1281px',
		},
		fontFamily: {
			sans: ['Open Sans', 'sans-serif'],
			serif: ['Bitter', 'serif'],
			hero: ['Bangers', 'sans-serif'],
		},
		extend: {
			backgroundImage: {
				stage: "url('./images/stage.jpg')",
			},
			colors: {
				primary: {
					50: '#0B26D9',
					100: '#0A24CC',
					200: '#0920B3',
					300: '#07198C',
					400: '#040E4D',
				},
				secondary: {
					50: '#f20018',
					100: '#e60119',
					200: '#cc0014',
					300: '#a60011',
					400: '#66000a',
				},
				accent: {
					alert: '#e6172c',
					warn: '#e6b517',
					success: '#17e646',
					info: '#0b2ae6',
				},
				body: {
					50: '#828282',
					100: '#333333',
					200: '#202020',
				},
				surface: {
					100: '#c2c2c2',
					200: '#333333',
				},
			},
		},
	},
	corePlugins: {
		aspectRatio: false,
	},
	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/line-clamp'),
	],
};
