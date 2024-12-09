import { Loader } from "@googlemaps/js-api-loader";

const loader = new Loader({
	apiKey: window.google_maps_api_key,
	version: "weekly",
});

document.addEventListener('DOMContentLoaded', function () {
	loader.load().then(async () => {
		const { Map } = await google.maps.importLibrary("maps");

		let position = new google.maps.LatLng(window.company_lat, window.company_lng);

		let map = new Map(document.getElementById("map"), {
			center: position,
			zoom: 16,
			disableDefaultUI: true,
			styles: [
				{
				  featureType: "poi.business",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.attraction",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.place_of_worship",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.school",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.sports_complex",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.medical",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "poi.park",
				  stylers: [{ visibility: "on" }],
				},
				{
				  featureType: "transit",
				  stylers: [{ visibility: "off" }],
				},
				{
				  featureType: "administrative",
				  elementType: "labels",
				  stylers: [{ visibility: "off" }],
				},
			  ],
		});

		let marker = new google.maps.Marker({
			position: position,
			map,
			icon: {
				url: window.site_icon_url,
				scaledSize: new google.maps.Size(64, 64),
			},
		});
	});
});
