document.addEventListener("DOMContentLoaded", function () {
	setTimeout(function () {
		const onScroll = function () {
			console.log('popup');
			window.removeEventListener('scroll', onScroll);
		};

		window.addEventListener('scroll', onScroll);
	}, 1000);
});
