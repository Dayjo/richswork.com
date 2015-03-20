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
					"url" => "/films/films"
				],
				"music" => [
				
				// Third Level
					"_children" => [
						"ben howard",
						"coldplay paradise",
						"metronomy",
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
			]
		]
	];

	public static function menu($menu = null, $path = "/"){
		if ( !$menu ) {
			$menu = self::$menu;
		}

		self::__path();		

		$html = "<ul>";

		foreach ( $menu as $name => $item ) {
			if ( is_numeric($name) ) {
				$name = $item;
			}

			$parts = ''; $selected = false;
			foreach( self::$path_array as $part ) {
				$parts .= $part;

				echo $name . ": " . $parts . " ---- " . $path  . $name ;

				if (  $parts === $path . $name  ) {
					$selected = true;
				}
				/*else {
					$selected = false;
				}*/

				echo " " . (int)$selected;
				echo "<br />";
				
			}



			$html .= "<li";

			$html .= ($selected ? " class='_selected' data-path='$path$name/' data-parts='$parts'" : '');

			$html .= "><a " . ( empty($item['_children']) ? "href" : "data-path" ) . "='{$path}{$name}'>"
			.  $name
		  	. "</a>";
			

			if ( !empty($item['_children']) ) {
				$path .=  $name . "/" ;

				$html .= self::menu($item['_children'], $path);
			}
			

			$html .= "</li>"; 
		}

		$html .= "</ul>";

		return $html;
	}

	public static function current(){

		return (object)$current;
	}

	public static function page() {
		echo self::__path();
	}

	public static function item($path) {
		self::__path();

		if ( $path == self::$path ) {
			echo 'class="_selected"';
		}
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
