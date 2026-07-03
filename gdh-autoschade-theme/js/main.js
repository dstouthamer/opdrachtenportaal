/**
 * GDH Autoschade — mobiel menu, FAQ-accordion en voor/na-schuifregelaar.
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

	// Voor/na-schuifregelaar.
	document.querySelectorAll('[data-ba]').forEach(function (ba) {
		var dragging = false;

		function setPos(clientX) {
			var rect = ba.getBoundingClientRect();
			var pos = ((clientX - rect.left) / rect.width) * 100;
			pos = Math.max(2, Math.min(98, pos));
			ba.style.setProperty('--ba-pos', pos + '%');
		}

		ba.addEventListener('pointerdown', function (e) {
			dragging = true;
			ba.setPointerCapture(e.pointerId);
			setPos(e.clientX);
		});

		ba.addEventListener('pointermove', function (e) {
			if (dragging) {
				setPos(e.clientX);
			}
		});

		['pointerup', 'pointercancel'].forEach(function (evt) {
			ba.addEventListener(evt, function () {
				dragging = false;
			});
		});
	});
})();
