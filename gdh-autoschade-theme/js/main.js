/**
 * GDH Autoschade — mobiel menu en FAQ-accordion.
 */
(function () {
	'use strict';

	// Mobiel menu.
	var toggle = document.querySelector('.gdh-nav-toggle');
	if (toggle) {
		toggle.addEventListener('click', function () {
			var open = document.body.classList.toggle('nav-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
	}

	// FAQ-accordion.
	document.querySelectorAll('.gdh-faq__q').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var item = btn.closest('.gdh-faq__item');
			var open = item.classList.toggle('is-open');
			btn.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
	});
})();
