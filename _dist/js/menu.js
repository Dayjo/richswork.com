var menuSelect = {
	nav: null,
	nav_links: null,
	make: function(selector) {
		this.nav = document.querySelector(selector);

		// Get the nav structure links
		this.nav_links = document.querySelectorAll(selector + " a");

		// Loop through the anchors and add click events
		for (var i = 0; i < this.nav_links.length; ++i) {

			// If I have a child list to show
			if ( this.nav_links[i].nextElementSibling && this.nav_links[i].nextElementSibling.tagName == 'UL' ) {

				// Hijack click and use js to change history
				this.nav_links[i].addEventListener('click',function(e){
					menuSelect.select(this);
					e.preventDefault();
					return false;
				},false);
			}
		}

		// Select the current one
		this.select_current();

	},
	path: function(path) {
		path = path.substr( path.lastIndexOf("/") + 1 );
		return path;
	},
	select: function(element){
		var current_selected;
		var parent_li = element.parentElement;
		var child_nodes = parent_li.parentElement.childNodes;
	
		// Unselect any child nodes 
		for ( var j = 0; j < child_nodes.length; ++j ) {
			
			if ( child_nodes[j].className == "_selected" ) {
				current_selected = child_nodes[j];
			}
		}
		if ( current_selected ) {
			current_selected.className = "";
		}

		// Unselect all other _selecteds
		var selected = this.nav.querySelectorAll("._selected");
		for ( var i = 0; i < selected.length; ++i ){ 
			selected[i].className = "";
		}

		// Select all parent lis
		var temp_el = element;
		var pli = null;
		while( pli = this.parent_li(temp_el) ) {
			pli.className = "_selected";
			temp_el = pli;
		}

		// Change the URL
	    History.pushState(null, null, element.href);

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
		if ( typeof	path == "undefined" ) { 
			path = window.location.pathname.replace(ROOT,'');
		}



		// Loop through the anchors and select whichever one is the current
		for (var i = 0; i < this.nav_links.length; ++i) {
			console.log(this.nav_links[i].href + " > " + ROOT + path );
			if ( this.nav_links[i].href && this.nav_links[i].href === ROOT + path ) {
				menuSelect.select(this.nav_links[i]);
			}
		}
	}
};

(function(window,undefined){

    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        var reg = new RegExp("/" + ROOT + "/");
        console.log(State.hash.replace(ROOT,''));
		menuSelect.select_current(State.hash.replace(ROOT,''));
    });


})(window);
