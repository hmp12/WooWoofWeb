<!DOCTYPE html>

<?php
	include '../php/init.php';
	include '../php/bot.php';
?>

<html>
	<head>

	</head>

	<body>
        <?php
        	$file = '../aiml/ai.aiml';

			$bot = new Bot($db);
			$bot->learn($file);
        ?>
	</body>
</html>
