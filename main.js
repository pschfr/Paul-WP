// Initiates particles, done before jQuery DOM loads for faster page loads
particlesJS.load('particles-cont', '/dev/wp-content/themes/paul/particlesjs-config.json', function() {
	console.log('particles.js config loaded');
});

// Loads webfonts from Google and IonIcons
WebFont.load({
	google: { families: [ 'Roboto:400,400italic,700', 'Cardo:400,400italic,700' ] },
	custom: { families: [ 'ionicons' ] },
	active: function (){ console.log('webfonts activated'); }
});

function initMap() {
	// https://snazzymaps.com/style/38/shades-of-grey
	// Edited to remove labels
	var styleArray = [{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];

	// Set map location and other settings
	var map = new google.maps.Map(document.getElementById('contact-map'), {
		center: {lat: 40.440, lng: -79.996},
		disableDefaultUI: true,
		styles: styleArray,
		scrollwheel: false,
		draggable: false,
		zoom: 14
	});
	console.log('map initiated and opened');
}

// Magic that disables pointer events on scroll, really improves performance
var body = document.body, timer;
window.addEventListener('scroll', function() {
	clearTimeout(timer);
	if(!body.classList.contains('disable-hover')) {
		body.classList.add('disable-hover');
	}
	timer = setTimeout(function() {
		body.classList.remove('disable-hover');
	}, 100);
}, false);

// Takes any element with vh for height and makes it a pixel value to prevent mobile resizing issues
function greedyJumbotron() {
	var lockedHeight = $(this).height();
	$(window).resize(function() {
		if (Math.abs(lockedHeight - $(this).height()) > 100) {
			lockedHeight = $(this).height();
			$(this).css('height', lockedHeight + 'px');
		}
	});
	$(this).css('height', lockedHeight + 'px');
	console.log('locked to ' + lockedHeight + 'px');
}

// Much faster than loading in tweet and like buttons, just send URL to share URL
$("a.js-social-share").on("click", function(e) {
	e.preventDefault();
	function windowPopup(url, width, height) {
		var left = (screen.width / 2) - (width / 2), top = (screen.height / 2) - (height / 2);
		window.open(url, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left);
	}
	windowPopup($(this).attr("href"), 500, 500);
	console.log('share window popped up');
});

// Does magic to send user to location in page
$('a.arrow').on('click', function(e) {
	e.preventDefault();
	// in here to prevent weird resizing errors on mobile due to auto-hiding the URL bar
	$('header#header').each(greedyJumbotron);
	var href = $(this).attr('href');
	$('html, body').animate({
		scrollTop: $(href).offset().top
	}, 500);
	console.log('scrolled to ' + href);
});

$(function() {
	// Locks header initally
	$('header#header').each(greedyJumbotron);

	// Pulls rendering information from the HTML, logs it in console
	$('body').contents().filter(function(){
		return this.nodeType == 8;
	}).each(function(i, e) {
		console.log('%c%s', 'font-size:18pt', e.nodeValue);
	});
});
