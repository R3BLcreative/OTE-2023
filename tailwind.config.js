/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./resources/views/**/**/*.blade.php',
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
				stage: "url('./images/bkg_stage.jpg')",
				pool: "url('./images/bkg_pool.jpg')",
				ote: "url('./images/bkg_ote.png')",
				tbe: "url('./images/bkg_tbe.jpg')",
				ducks: "url('./images/bkg_duckies.jpg')",
				worship: "url('./images/bkg_worship.jpg')",
			},
			colors: {
				primary: {
					50: '#FF3030',
					100: '#FF0000',
					200: '#BD0000',
					300: '#800000',
					400: '#400000',
				},
				secondary: {
					50: '#6BFF6B',
					100: '#00ff00',
					200: '#00BD00',
					300: '#008000',
					400: '#004000',
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
					50: '#fafafa',
					100: '#ededed',
				},
				social: {
					facebook: '#4267B2',
					twitter: '#1DA1F2',
					instagram: '#833AB4',
					website: '#F77737',
				},
			},
			dropShadow: {
				sm: '0 1px 1px rgba(0, 0, 0, 0.75)',
				base: '0 1px 2px rgba(0, 0, 0, 0.75)',
				md: '0 4px 3px rgba(0, 0, 0, 0.75)',
				lg: '0 10px 8px rgba(0, 0, 0, 0.75)',
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
