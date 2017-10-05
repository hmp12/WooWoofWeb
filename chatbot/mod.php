
<?php
	include '../php/init.php';
	include '../php/bot.php';
?>

<html>
	<head>
		<?php include '../html/head.html';?>
	</head>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$file = $_POST["file"];
			$file = '../aiml/ai.aiml';

			$bot = new Bot($db);
			$bot->learn($file);
			
			$conn->close();
		}
	?>
	<body>
		<div class="center">

			<form action="mod.php" method="post">
				<label>Type aiml file path to import to datasbase</label>
				<input type="file" name="file">
				<input type="submit" value="Import" name="import">
			</form>
		</div>
	</body>
</html>