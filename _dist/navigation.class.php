<?php

Class Navigation {
	static $path;
	static $path_array;

	static $menu = [
		// Top level
		"films" => [
			"url" 	=> "/films",
			"title"	=> "",
			"target" => "",
				
			// Second level
			"_children" => [
				"films" => [
					"url" => "/films/films",
					"_children" => [
						"godfather",
						"star wars"
					]
				],
				"music" => [
				
				// Third Level
					"_children" => [
						"ben howard",
						"coldplay paradise",
						"metronomy" => "metronomy.html",
						"keaton hensen",
						"delilah",
						"emilie sande",
						"coldcut",
						"sonny j",
						"gorrillaz feat de la soul",
					]
				],
				"commercial",
				"contact",
			] // End of second level
		] // End of Top level
	];

	public static function Menu() {
		include "menu.php";
	}

	public static function Page(){
		
		include self::__cln(substr(self::__path(),1)) . ".html";
		echo '<script>var ROOT = "' . ROOT . '";</script>';
	}

	public static function __old_menu($menu = null, &$path = "/"){
		if ( !$menu ) {
			$menu = self::$menu;
		}

		self::__path();		

		$html = "<ul>";

		foreach ( $menu as $name => $item ) {
			if ( is_numeric($name) ) {
				$name = $item;
			}

			$c_name = self::__cln($name);

			$parts = ''; $selected = false;
			foreach( self::$path_array as $part ) {
				$parts .= $part;

				if (  $parts === $path . $c_name  ) {
					$selected = true;
				}				
			}

			$html .= "<li";

			$html .= ($selected ? " class='_selected'" : '');
			$href = ROOT . $path . $c_name;
			$html .= "><a " . ( !empty($item['_children']) ? "data-path" : "" ) . "='$href' href='$href'>"
			.  $name
		  	. "</a>";
			

			if ( !empty($item['_children']) ) {
				$path .=  $c_name . "/";
				$html .= self::menu($item['_children'], $path);
			}

			$html .= "</li>"; 
		}
		
		// reset the path back a level
		$path = dirname($path) . "/";

		$html .= "</ul>";

		return $html;
	}

	public static function current(){

		return (object)$current;
	}

	

	public static function item($path) {
		self::__path();

		if ( $path == self::$path ) {
			echo 'class="_selected"';
		}
	}

	/**
	 * cleans the name
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	private static function __cln( $name ){
		$name = preg_replace("/[^a-zA-Z0-9]+/", "-", $name);
		return strtolower($name);
	}

	public static function __path() {
		if ( !self::$path ) {
			self::$path = str_replace(ROOT, "", $_SERVER['REQUEST_URI']);

			preg_match_all('/\\/?[a-zA-Z0-9_-]+/',self::$path,$matches);

			self::$path_array = $matches[0];
		}



		return self::$path;
	}

}
