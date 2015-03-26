var menuSelect = {
	make: function(selector) {
		
		var path = this.path(window.location.pathname);

		// Get the nav structure links
		var nav_links = document.querySelectorAll(selector + " a");

		// Loop through the anchors and add click events
		for (var i = 0; i < nav_links.length; ++i) {

			if ( nav_links[i].dataset.path ) {
				nav_links[i].addEventListener('click',function(e){
					menuSelect.select(this);
					e.preventDefault();
					return false;
				},false);
			}
			else if ( nav_links[i].href && this.path(nav_links[i].href) === path ) {
				menuSelect.select(nav_links[i]);
			}


		}
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

		// Select all parent lis
		parent_li;


		parent_li.className = "_selected";

		if ( history.pushState ) {
		    history.pushState(null, null, element.dataset.path);
		}
		else {
		    location.hash = element.dataset.path;
		}

	},

	select_parents: function(el){
	    while (el.parentNode.tagName === "li") {
	        el = el.parentNode;
	        if (el.tagName === tag)
	            return el;
	    }
	    return null;
	}
};
