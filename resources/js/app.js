import { ceil } from 'lodash';
import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
	// BURGER MENU
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

	// FAQ ACCORDION
	function toggleAccordion(toggle, item) {
		var isExpanded = item.getAttribute('aria-expanded') === 'true';
		toggle.setAttribute('aria-expanded', !isExpanded);
		item.setAttribute('aria-expanded', !isExpanded);
	}

	var faqs = document.querySelectorAll('.faq-item');

	Array.prototype.forEach.call(faqs, function (el) {
		var question = el.querySelector('.question');
		var answer = el.querySelector('.answer');
		question.addEventListener('click', function (e) {
			e.preventDefault();
			toggleAccordion(question, answer);
		});
	});

	// INPUT MASKING
	// This code empowers all input tags having a placeholder and data-slots attribute
	for (const el of document.querySelectorAll('[placeholder][data-slots]')) {
		const pattern = el.getAttribute('placeholder'),
			slots = new Set(el.dataset.slots || '_'),
			prev = ((j) =>
				Array.from(pattern, (c, i) => (slots.has(c) ? (j = i + 1) : j)))(0),
			first = [...pattern].findIndex((c) => slots.has(c)),
			accept = new RegExp(el.dataset.accept || '\\d', 'g'),
			clean = (input) => {
				input = input.match(accept) || [];
				return Array.from(pattern, (c) =>
					input[0] === c || slots.has(c) ? input.shift() || c : c
				);
			},
			format = () => {
				const [i, j] = [el.selectionStart, el.selectionEnd].map((i) => {
					i = clean(el.value.slice(0, i)).findIndex((c) => slots.has(c));
					return i < 0
						? prev[prev.length - 1]
						: back
						? prev[i - 1] || first
						: i;
				});
				el.value = clean(el.value).join``;
				el.setSelectionRange(i, j);
				back = false;
			};
		let back = false;
		el.addEventListener('keydown', (e) => (back = e.key === 'Backspace'));
		el.addEventListener('input', format);
		el.addEventListener('focus', format);
		el.addEventListener('blur', () => el.value === pattern && (el.value = ''));
	}

	// FORM DEPENDENCIES & OTHER FEATURES
	for (const container of document.querySelectorAll('[data-hasDeps]')) {
		const toggles = container.querySelectorAll('[data-deps]');
		for (const toggle of toggles) {
			const item = container.querySelector(
				'#' + toggle.getAttribute('aria-controls')
			);
			toggle.addEventListener('click', (e) => {
				toggleDeps(toggle, item, toggles, container);
			});
		}
	}

	function toggleDeps(toggle, item, toggles, container) {
		var otherDeps = container.querySelectorAll('input[data-deps]');
		var checkedDeps = container.querySelectorAll('input[data-deps]:checked');
		var isExpanded = toggle.getAttribute('aria-expanded') === 'true';

		if (isExpanded === true && otherDeps.length == 1) {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'false'));
			item.setAttribute('aria-expanded', 'false');
			item.style.maxHeight = '0px';
			item.style.opacity = '0';
		} else if (
			isExpanded === true &&
			otherDeps.length > 1 &&
			checkedDeps.length == 0
		) {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'false'));
			item.setAttribute('aria-expanded', 'false');
			item.style.maxHeight = '0px';
			item.style.opacity = '0';
		} else {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'true'));
			item.setAttribute('aria-expanded', 'true');
			item.style.maxHeight = '500px';
			item.style.opacity = '1';
		}
	}

	// Textarea char counter and limiter
	for (const el of document.querySelectorAll('textarea[data-max]')) {
		const max = el.dataset.max;
		const counter = document.querySelector('#' + el.dataset.counter);

		const limitChars = () => {
			if (el.value.length > max) {
				el.value = el.value.substring(0, max);
			}

			let chars = el.value.length;
			let count = chars;
			counter.textContent = count + '/' + max;

			if (count > Math.ceil(max * 0.3) && count < Math.ceil(max * 0.6)) {
				counter.style.color = 'green';
			} else if (count > Math.ceil(max * 0.6) && count < Math.ceil(max * 0.9)) {
				counter.style.color = 'orange';
			} else if (count > Math.ceil(max * 0.9)) {
				counter.style.color = 'red';
			} else {
				counter.style.color = 'inherit';
			}
		};

		el.addEventListener('input', limitChars);
	}
});
