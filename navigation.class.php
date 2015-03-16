<?php

Class Navigation {
	static $path;

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

	public static function menu($menu = null){
		if ( !$menu ) {
			$menu = self::$menu;
		}

		$html = "<ul>";

		foreach ( $menu as $name => $item ) {
			if ( is_numeric($name) ) {
				$name = $item;
			}
			
			$html .= "<li>";
			$html .= "<a>" . $name . "</a>";

			if ( !empty($item['_children']) ) {
				$html .= self::menu($item['_children']);
			}

			$html .= "</li>"; 
		}

		$html .= "</ul>";

		return $html;
	}

	public static function current(){

	}

	public static function item($path) {
		self::__path();

		if ( $path == self::$path ) {
			echo 'class="_selected"';
		}
	}

	public function __path() {
		if ( !self::$path ) {
			self::$path = str_replace($GLOBALS['__ROOT'], "", $_SERVER['REQUEST_URI']);
		}
	}

}
