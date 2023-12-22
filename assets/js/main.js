/*
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

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

if(window.location.href === "http://clavosclami.com/index.html" || window.location.href === "https://clavosclami.com/index.html" || window.location.href === "https://www.clavosclami.com/index.html" || window.location.href === "https://clavosclami.com" || window.location.href === "http://clavosclami.com/"){
    const swiper = new Swiper('.swiper', {
    	slidesPerViw: 1,
    	spaceBetween: 30,
      	loop: true,
    	autoplay: {
    		delay: 8000
    	}
    });
}