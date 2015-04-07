var menuSelect = {
	nav: null,
	nav_links: null,
	make: function(selector) {
		this.nav = document.querySelector(selector);

		// Get the nav structure links
		this.nav_links = document.querySelectorAll(selector + " a");

		$('.nav-opener').click(function(){
			$('nav').toggleClass('open');
		});

	    $('nav ul[data-nav-lvl="2"], nav ul[data-nav-lvl="3"]').each(function(){
	        $(this).css({top: (-10 - $(this).height()) });
	    });

	    $('nav a').click(function(e){
	        var nav_id = $(this).data('nav-id');
	        var lvl = $(this).closest('[data-nav-lvl]').data('nav-lvl');

	        // If there's a sub menu (otherwise just go to the link)
	        if ( nav_id ){
		        var $others = $('nav ul.nav-lvl-'+(lvl+1) + ', nav ul.nav-lvl-'+(lvl+2))
		        .filter(function(){
		        	// Don't hide current
		        	var nav_for = $(this).data('nav-for');
		        	if ( nav_for == nav_id ){
		        		return false;
		        	}

		            return $(this).position().top > -$(this).height();
		        }).each(function(){
			        $(this).css({ opacity: 0, top: -$(this).height()});
			    });


	        	$('ul[data-nav-for="' + nav_id + '"]').css({
	        	    opacity: 1, top: 0
	        	});

		        // Change the URL
		        History.pushState(null, null, this.href);

		        e.preventDefault();
		        return false;
		    }
	    });

		// Select the current one
		this.select_current();

	},
	path: function(path) {
		path = path.substr( path.lastIndexOf("/") + 1 );
		return path;
	},
	select: function(element, show){
		//var parent_ul = element.parentElement;
		//var child_nodes = parent_li.parentElement.childNodes;
		
		// Make sure this one's container is visible, and the parents 
		$(element).closest('ul').css({top: 0, opacity: 1});

		var nav_lvl = $(element).closest('ul').data('nav-lvl');

		if ( show != 'show' ){
			element.click();
		}
		else {
			var nav_id = $(element).data('nav-id');
			var lvl = $(element).closest('[data-nav-lvl]').data('nav-lvl');

	        // There are sub menus
	        if ( lvl < 3 ){
		        var $others = $('nav ul.nav-lvl-'+(lvl+1) + ', nav ul.nav-lvl-'+(lvl+2))
		        .filter(function(){
		        	// Don't hide current
		        	var nav_for = $(this).data('nav-for');
		        	if ( nav_for == nav_id ){
		        		return false;
		        	}

		            return $(this).position().top > -$(this).height();
		        }).each(function(){
			        $(this).css({ opacity: 0, top: -$(this).height()});
			    });


	        	$('ul[data-nav-for="' + nav_id + '"]').css({
	        	    opacity: 1, top: 0
	        	});
		    }

		    $(element).closest('ul').find('a._selected').removeClass('_selected');
		    $(element).addClass('_selected');
		}

		// Change the URL
	    //History.pushState(null, null, element.href);

	},

	parent_li: function(el){
	    while ( el.parentNode ) {
	        el = el.parentNode;
	        if (el.tagName === "LI")
	            return el;
	    }
	    return null;
	},

	select_current: function( path ){
		var href;

		if ( typeof	path == "undefined" ) { 
			path = window.location.pathname.replace(ROOT,'');
		}

		var xpath = ROOT;
		var parts = path.substr(1).split("/");

		for ( var i in parts ) {
			xpath += "/" + parts[i];

			if ( i < parts.length ) {
				// Loop through the anchors and select whichever one is the current
				for (var i = 0; i < this.nav_links.length; ++i) {
					href = this.nav_links[i].getAttribute('href');

					if ( href && href === xpath ) {
						menuSelect.select(this.nav_links[i], 'show');
					}
				}
			}
		}

		// Loop through the anchors and select whichever one is the current
		for (i = 0; i < this.nav_links.length; ++i) {
			href = this.nav_links[i].getAttribute('href');

			if ( href && href === ROOT + path ) {
				menuSelect.select(this.nav_links[i],'show');
			}
		}
	}
};

(function(window,undefined){

    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        var reg = new RegExp("/" + ROOT + "/");
		menuSelect.select_current(State.hash.replace(ROOT,''));
    });

})(window);
