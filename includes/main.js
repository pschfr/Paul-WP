// Initiates particleground
particleground(document.getElementById('particles-cont'));

// Checks to see if fonts are in sessionStorage, loads faster if cached
(function() {
	if (sessionStorage.fonts) {
		document.documentElement.classList.add('wf-active');
		console.log("fonts loaded from cache");
	} else { console.log("no fonts in cache"); }
})();

// Loads webfonts from Google and IonIcons
WebFont.load({
	google: { families: [ 'Roboto:400,400italic,700', 'Amiri:400,400italic,700' ] },
	custom: { families: [ 'ionicons' ], urls: [ '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css' ] },
	active: function (){
		// caches the fonts in sessionStorage
		sessionStorage.fonts = true;
		console.log('webfonts activated');
	}
});

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
// TODO: Rewrite in vanilla JS
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
// TODO: Rewrite in vanilla JS
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
// TODO: Rewrite in vanilla JS
$('a.arrow').on('click', function(e) {
	e.preventDefault();
	// in here to prevent weird resizing errors on mobile due to auto-hiding the URL bar
	$('header#header').each(greedyJumbotron);
	$('html, body').animate({
		scrollTop: $($(this).attr('href')).offset().top
	}, 500);
	console.log('scrolled to ' + $(this).attr('href'));
});

$(function() {
	// Locks header initally
	$('header#header').each(greedyJumbotron);
	// Pulls rendering information from the HTML, logs it in console
	// TODO: Rewrite in vanilla JS
	$('body').contents().filter(function(){
		return this.nodeType == 8;
	}).each(function(i, e) {
		console.log('%c%s', 'font-weight:bold;', e.nodeValue);
	});
});
