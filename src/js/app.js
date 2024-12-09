// lazyload
import LazyLoad from "vanilla-lazyload";

new LazyLoad({});

document.addEventListener('DOMContentLoaded', function () {
	// headers
	document.getElementById('mobile-menu-open-button').addEventListener('click', function () {
		document.getElementById('mobile-menu').style.width = '100%';
		document.getElementById('mobile-menu-overlay').style.display = 'block';
		document.getElementById('mobile-menu-overlay').style.opacity = '100%';
	});

	document.getElementById('mobile-menu-close-button').addEventListener('click', function () {
		document.getElementById('mobile-menu').style.width = '0';
		document.getElementById('mobile-menu-overlay').style.display = 'none';
		document.getElementById('mobile-menu-overlay').style.opacity = '0';
	});

	document.getElementById('mobile-menu-overlay').addEventListener('click', function () {
		document.getElementById('mobile-menu').style.width = '0';
		document.getElementById('mobile-menu-overlay').style.display = 'none';
		document.getElementById('mobile-menu-overlay').style.opacity = '0';
	});

	let mobileMenuAccordionToggle = document.getElementsByClassName('mobile-menu-accordion-toggle');

	for (let i = 0; i < mobileMenuAccordionToggle.length; i++) {
		mobileMenuAccordionToggle[i].addEventListener('click', function () {
			let accordion = mobileMenuAccordionToggle[i].parentElement.querySelector('.mobile-menu-accordion');
			let mobileMenuAccordionPanel = mobileMenuAccordionToggle[i].parentElement.nextElementSibling;

			accordion.classList.toggle('active');

			mobileMenuAccordionToggle[i].classList.toggle('active');

			if (mobileMenuAccordionPanel.style.display === 'block') {
				mobileMenuAccordionPanel.style.display = 'none';
			} else if (mobileMenuAccordionPanel) {
				mobileMenuAccordionPanel.style.display = 'block';
			}
		});
	}

	// popups
	if (window.popups) {
		const popups = document.querySelectorAll('.popup');

		setTimeout(function () {
			const triggerPopupsOnScroll = function () {
				popups.forEach(function (popup) {
					popup.style.display = 'block';
				});

				window.removeEventListener('scroll', triggerPopupsOnScroll);
			};

			window.addEventListener('scroll', triggerPopupsOnScroll);
		}, 300);

		popups.forEach(function (popup) {
			const popupOverlay = popup.querySelector('.popup-overlay');
			const popupCloseButton = popup.querySelector('.popup-close-button');

			if (popupOverlay) {
				popupOverlay.addEventListener('click', function () {
					popup.style.display = 'none';
				});
			}

			if (popupCloseButton) {
				popupCloseButton.addEventListener('click', function () {
					popup.style.display = 'none';
				});
			}
		});
	}
});
