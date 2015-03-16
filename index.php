<?php
	include "navigation.class.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=Navigation::current()->title;?></title>

		<link rel="stylesheet" type="text/css" href="css/menu.css" />
	</head>
	<body>
		<?
			// Ouutput the UL LI structure for the menu
			echo Navigation::menu();

			// Include the current page
			Navigation::page();
		?>

		<script src="js/menu.js" type="text/javascript"></script>
		<script type="text/javascript">menuSelect.make('nav');</script>
	</body>
</html>