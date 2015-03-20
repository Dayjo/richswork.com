<?php
	include "config.php";
	include "navigation.class.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=Navigation::current()->title;?></title>

		<link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/menu.css" />
	</head>
	<body>
		<nav>
			<ul>
			<?
				// Output the LI structure for the menu
				echo Navigation::menu();
			?>
			</ul>
		</nav>

		<?
			// Include the current page
			Navigation::page();
		?>

		<script src="js/menu.js" type="text/javascript"></script>
		<script type="text/javascript">menuSelect.make('nav');</script>
	</body>
</html>