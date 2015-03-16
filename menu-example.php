<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
			nav ul a:hover {
				cursor: pointer;
			}

			nav ul li ul {
				display: none;
			}

			nav ul li._selected > ul {
				display: block;
			}
		</style>
	</head>
	<body>
		<?include 'menu.php';?>

		<script src="js/menu.js" type="text/javascript">
			menuSelect.make('nav');
		</script>
	</body>
</html>