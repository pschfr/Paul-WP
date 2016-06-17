// Initiates particleground and tweaks density
// TODO: once scrolled past top, pause particleground via pg.pause();
particleground(document.getElementById('particles-cont'), {
	density: '9000'
});

// Tweaks ZenScroll default speed
zenscroll.setup(500);

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
// function greedyJumbotron() {
// 	var lockedHeight = $(this).height();
// 	$(window).resize(function() {
// 		if (Math.abs(lockedHeight - $(this).height()) > 100) {
// 			lockedHeight = $(this).height();
// 			$(this).css('height', lockedHeight + 'px');
// 		}
// 	});
// 	$(this).css('height', lockedHeight + 'px');
// 	console.log('locked to ' + lockedHeight + 'px');
// }

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
