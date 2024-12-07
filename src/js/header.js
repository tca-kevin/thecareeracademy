document.addEventListener('DOMContentLoaded', function () {
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
});
