/*
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

const swiper = new Swiper('.swiper', {
	slidesPerViw: 1,
	spaceBetween: 30,
  	loop: true,
	autoplay: {
		delay: 10000
	}
});

(function($) {

	var	$window = $(window),
		$body = $('body');

	// Breakpoints.
		breakpoints({
			xlarge:  [ '1281px',  '1680px' ],
			large:   [ '981px',   '1280px' ],
			medium:  [ '737px',   '980px'  ],
			small:   [ null,      '736px'  ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Dropdowns.
		$('#nav > ul').dropotron({
			mode: 'fade',
			noOpenerFade: true,
			alignment: 'center'
		});

	// Nav.

		// Title Bar.
			$(
				'<div id="titleBar">' +
					'<a href="#navPanel" class="toggle"></a>' +
				'</div>'
			)
				.appendTo($body);

		// Panel.
			$(
				'<div id="navPanel">' +
					'<nav>' +
						$('#nav').navList() +
					'</nav>' +
				'</div>'
			)
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'left',
					target: $body,
					visibleClass: 'navPanel-visible'
				});

})(jQuery);

document.getElementById('openButton').addEventListener('click', function() {
	document.getElementById('popup-overlay1').style.display = 'flex';
});

window.addEventListener('click', function(event) {
	var popup = document.getElementById('popup-overlay1');
	if (event.target === popup) {
		closePopup('popup-overlay1');
	}
});

// Función para cerrar el popup
function closePopup(popupId) {
	document.getElementById(popupId).style.display = 'none';
}

// Leaflet map
var map = L.map('map').setView([3.900610313023761, -73.45343586233082], 6);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Markers
// var greenIcon = L.icon({
//     iconUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLd1U5oxyRzC7vSZGD-hkzHazZdGyNFGheRg&usqp=CAU',

//     iconSize:     [38, 20],
//     iconAnchor:   [10, 10],
//     popupAnchor:  [-3, -76]
// });

// var marker = L.marker([4.5713646965303765, -74.07370601233518], {icon: greenIcon}).addTo(map);
var marker = L.marker([4.5713646965303765, -74.07370601233518]).addTo(map);

var circle = L.circle([4.5713646965303765, -74.07370601233518], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 30000
}).addTo(map);

// var polygon = L.polygon([
//     [51.509, -0.08],
//     [51.503, -0.06],
//     [51.51, -0.047]
// ]).addTo(map);

marker.bindPopup("<h4>Los Acacios</h4>").openPopup();
circle.bindPopup("<h4>Los Acacios</h4><br><img src='../assets/images/laboratorio.png' width='100%'>");
// polygon.bindPopup("I am a polygon.");