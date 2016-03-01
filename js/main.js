// Takes any element with vh for height and makes it a pixel value to prevent mobile resizing issues
function greedyJumbotron() {
	var viewportHeight = $(window).height();
	$(window).resize(function() {
		if (Math.abs(viewportHeight - $(window).height()) > 100) {
			viewportHeight = $(window).height();
			$(this).css('height', viewportHeight + 'px');
		}
	});
	$(this).css('height', viewportHeight + 'px');
	console.log('locked to ' + viewportHeight + 'px');
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
	var href = $(this).attr('href');
	$('html, body').animate({
		scrollTop: $(href).offset().top
	}, 500);
	// in here to prevent weird resizing errors on mobile due to auto-hiding the URL bar
	$('header#header').each(greedyJumbotron);
	console.log('scrolled to ' + href);
});

$(function() {
	// Initiates particles, locks header
	particlesJS.load('particles-cont', 'wp-content/themes/paul/js/particlesjs-config.json', function() {
		console.log('particles.js config loaded');
		$('header#header').each(greedyJumbotron);
	});

	// Initiates jribbble, gets shots back from Dribbble API
	$.jribbble.setToken('00ec9c39f4ec6509d9e7fca3b51c7a4ff92bcb8192d7fd7c374c6fd454ce6b06').users('pschfr').shots({per_page: 20}).then(function(shots) {
		var html = [];

		shots.forEach(function(shot) {
			html.push('<li class="shots--shot">');
    		html.push('<a href="' + shot.html_url + '" target="_blank">');
    		html.push('<img src="' + shot.images.normal + '" title="' + shot.title + ', ' + shot.likes_count + ' likes">');
			//html.push('<small>' + shot.description + '</small>');
    		html.push('</a></li>');
			console.log('dribbble shots added');
			// http://developer.dribbble.com/v1/shots/#response
			// for reference if you wanna see what else you can return
		});

		$('#shots').html(html.join(''));
	});

	// Initiates gitQuery.js, returns repos
	$('#gitProjects').getRepos('pschfr');
	// 2a4f4979b74886a6be297164e084798a698b4dcf
});
