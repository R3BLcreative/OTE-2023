import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
	function toggleNavigation(toggle, menu) {
		var isExpanded = menu.getAttribute('aria-expanded') === 'true';
		menu.setAttribute('aria-expanded', !isExpanded);
		toggle.setAttribute('aria-expanded', !isExpanded);
	}

	function closeNavigation(toggle, menu) {
		menu.setAttribute('aria-expanded', false);
		toggle.setAttribute('aria-expanded', false);
		toggle.focus();
	}

	var burgerToggle = document.querySelector('header .burger-toggle');
	var burgerMenu = document.querySelector('header .burger-menu');

	burgerToggle.addEventListener('click', function (e) {
		e.stopPropagation();
		toggleNavigation(this, burgerMenu);
	});

	document.addEventListener('keyup', function (e) {
		if (e.key === 'Escape') {
			e.stopPropagation();
			closeNavigation(burgerToggle, burgerMenu);
		}
	});

	var collapsible = document.querySelectorAll('.collapsible-nav');

	Array.prototype.forEach.call(collapsible, function (el) {
		var toggle = el.querySelector('.collapsible-nav-toggle');
		el.addEventListener('click', function (e) {
			toggleNavigation(toggle, this);
		});

		el.addEventListener('keyup', function (e) {
			if (e.keyCode === ESCAPE) {
				closeNavigation(toggle, this);
			}
		});
	});
});
