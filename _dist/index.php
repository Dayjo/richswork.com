<?php
	include "config.php";
	include "navigation.class.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="/richswork.com/_dist/css/menu.css" />
        <link rel="stylesheet" type="text/css" href="/richswork.com/_dist/css/style.css" />
    </head>
    <body>
        <nav>
            <? Navigation::Menu(); ?>
        </nav>

        <main>
        	<? Navigation::Page(); ?>
        </main>

        <script src="/richswork.com/_dist/js/native.history.js" type="text/javascript"></script>
        <script src="/richswork.com/_dist/js/menu.js?c=<?=time();?>" type="text/javascript"></script>
        <script type="text/javascript">menuSelect.make('nav');</script>
    </body>
</html>