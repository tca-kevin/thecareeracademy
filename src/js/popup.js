document.addEventListener("DOMContentLoaded", function () {
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
		const popupCloseButton = popup.querySelector('.popup-close-button');

		if (popupCloseButton) {
			popupCloseButton.addEventListener('click', function () {
				popup.style.display = 'none';
			});
		}
	});
});
