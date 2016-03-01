jQuery.gitUser = function (username, callback) {
	//Change per_page according to your need.
	jQuery.getJSON('https://api.github.com/users/' + username + '/repos?per_page=20&callback=?', callback);
};

jQuery.fn.getRepos = function (username) {
	this.html("<p>Hold on tight, digging out " + username + "'s repositories&hellip;</p>");

    var target = this;
    $.gitUser(username, function (data) {
		var repos = data.data; // JSON Parsing
		console.log(repos.length + ' repos returned for ' + username);

		sortRepos(repos);

		var list = $('<dl/>');
		target.empty().append(list);

		$(repos).each(function () {
			list.append('<dt><strong><a href="' + this.html_url + '" target="_blank">' + this.name + '</a></strong><span class="right">' + (this.language ? ('<em>' + this.language + '</em>') : '') + (this.watchers_count ? (' &mdash; <span class="ion-star"></span> ' + this.watchers_count) : '') + (this.forks ? (' &mdash; <span class="ion-fork-repo"></span> ' + this.forks) : '') + '</span><br>' + (this.description ? (this.description) : '') + (this.homepage ? ('<br><a href="' + this.homepage + '" target="_blank">' + this.homepage + '</a><span class="ion-arrow-right-c"></span>') : '') + '</dt>');
			// https://developer.github.com/v3/repos/
			// For reference if you want to return additional values
		});
	});

	function sortRepos(repos) {
		repos.sort(function (a, b) {
			// Sort descending based on id, for most recent projects first
		    return b.id - a.id;
		});
	}
};
