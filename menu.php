<?
	$GLOBALS['__ROOT'] = "/richswork.com";
	include __DIR__ . "/menu.class.php";
?>

<nav id="#menu">
	<ul>
		<li <?=Menu::item("/films")?>>
			<a>films</a>
			<ul>
				<li <?=Menu::item("/films/films")?>>
					<a>films</a>
				</li>
				<li <?=Menu::item("/films/music")?>>
					<a>music</a>
					<ul>
						<li <?=Menu::item("/films/music/ben-howard")?>>
							<a href="ben-howard">ben howard</a>
						</li>
						<li>
							<a href="coldplay-paradise">coldplay paradise</a>
						</li>
						<li <?=Menu::item("/films/music/metronmy")?>>
							<a href="metronomy">metronomy</a>
						</li>
						<li>
							<a href="keaton-hensen">keaton hensen</a>
						</li>
						<li>
							<a href="delilah">delilah</a>
						</li>
						<li>
							<a href="emilie-sande">emilie sande</a>
						</li>
						<li>
							<a href="coldcut">coldcut</a>
						</li>
						<li <?=Menu::item("/films/music/sonny-j")?>>
							<a href="sonny-j">sonny j</a>
						</li>
						<li>
							<a href="gorrillaz">gorrillaz feat de la soul</a>
						</li>
					</ul>
				</li>
				<li>
					<a>commercial</a>
				</li>
				<li>
					<a>contact</a>
				</li>
			</ul>
		</li>
		<li>
			<a>stills</a>
			<ul>
				<li>
					<a>landscape</a>
					<ul>
						<li <?=Menu::item("/stills/landscape/beach")?>>
							<a href="beach">beach</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a>projects</a>
		</li>
		<li>
			<a>art</a>
		</li>
		<li>
			<a>contact</a>
		</li>
	</ul>
</nav>

