<?php
	include "config.php";
	include "navigation.class.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=Navigation::current()->title;?></title>

		<link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/menu.css" />
		<link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/style.css" />
	</head>
	<body>
		<nav>
			<?
				// Output the LI structure for the menu
				echo Navigation::menu();
			?>
		</nav>

		<?
			// Include the current page
			Navigation::page();
		?>

		<script src="<?=ROOT?>/js/menu.js" type="text/javascript"></script>
		<script type="text/javascript">menuSelect.make('nav');</script>
	</body>
</html>