<?php require("../../../../wp-blog-header.php"); ?>

Livesearch = Class.create();

Livesearch.prototype = {
	initialize: function(url, pars, attachitem, contentitem, loaditem, resetitem, searchtext) {
		this.attachitem = attachitem;
		this.contentitem = contentitem;
		this.resetitem = resetitem;
		this.url = url;
		this.pars = pars;
		this.loaditem = loaditem;
		this.searchtext = searchtext;
		this.t = null;  // Init timeout variable

		Element.hide($(this.contentitem));
		
		// Style the searchform for livesearch
		$(attachitem).className = 'livesearch';
		$(attachitem).setAttribute('autocomplete','off');
		$(attachitem).setAttribute('value', searchtext);
		Event.observe(attachitem, 'focus', function() { if ($(attachitem).value == searchtext) $(attachitem).setAttribute('value', '') });
		Event.observe(attachitem, 'blur', function() { if ($(attachitem).value == '') $(attachitem).setAttribute('value', searchtext) });

		$(this.resetitem).onclick = function() {
			$(contentitem).innerHTML = null;
			Element.hide($(resetitem));
			new Effect.Fade($(contentitem));
			$(attachitem).value = '';
		}

		// Bind the keys to the input
		Event.observe(attachitem, 'keyup', this.readyLivesearch.bindAsEventListener(this));
	},

	readyLivesearch: function(event) {
		var code = event.keyCode;
		var currentLivesearch = this;
		if (code == Event.KEY_ESC || ((code == Event.KEY_DELETE || code == Event.KEY_BACKSPACE) && $F(this.attachitem) == '')) {
			this.resetLivesearch();
		} else if (code != Event.KEY_LEFT && code != Event.KEY_RIGHT && code != Event.KEY_DOWN && code != Event.KEY_UP && code != Event.KEY_RETURN) {
			if (this.t) { clearTimeout(this.t) };
	        this.t = setTimeout(this.doLivesearch.bind(this), 1000);
		}
	},

	searchComplete: function() {
		Element.show($(this.resetitem));
		new Effect.Fade(this.loaditem);
		new Effect.Appear(this.contentitem);
	},

	searchLoading: function() {
		new Effect.Appear(this.loaditem);
	},

	doLivesearch: function() {
		searchStr = $F(this.attachitem);

		if (searchStr == '' || searchStr == this.searchtext) {
			return false;
		}

		new Ajax.Updater(
			this.contentitem,
			this.url,
			{
				method: 'get',
				parameters: this.pars + searchStr,
				onComplete: this.searchComplete(),
				onLoading: this.searchLoading()
		});
	},

	resetLivesearch: function() {
		/*$(this.contentitem).innerHTML = null;*/
		Element.hide($(this.resetitem));
		new Effect.Appear(this.contentitem);
		/*Element.hide($(this.contentitem));*/
		$(this.attachitem).value = '';
	}
}

Event.observe(window, "load", function() { new Livesearch('<?php bloginfo('template_url'); ?>/livesearch.php', 'searchquery=', 'searchinput', 'search-results', 'search-loading', 'search-reset', 'Type and Wait to Search'); } , false);
