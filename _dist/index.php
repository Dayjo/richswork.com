<?php
	include "config.php";
	include "navigation.class.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/menu.css" />
        <link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/style.css" />
    </head>
    <body>
        <a class="nav-opener" href="javascript:void(0);">OPEN</a>
        <nav>
            <? Navigation::Menu(); ?>
        </nav>

        <main>
        	<? Navigation::Page(); ?>
        </main>

        <script src="<?=ROOT?>/js/jquery-1.11.2.js"></script>
        <script src="<?=ROOT?>/js/native.history.js" type="text/javascript"></script>
        <script src="<?=ROOT?>/js/menu.js?c=" type="text/javascript"></script>
        <script type="text/javascript">
        $(function(){
            menuSelect.make('nav');
        });
        </script>
    </body>
</html>