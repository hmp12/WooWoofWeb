
<?php
	/*
	session_start();
	if (empty($_SESSION["usr"]) || $_SESSION["usr"]!="root") {
		header("location: error.php");
	}
	*/
?>

<html>
	<head>
		<?php include '../html/head.html';?>
	</head>
	<body>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				include '../php/connectDB.php';
				$file = $_POST["file"];

				$xml = simplexml_load_file($_POST["file"]);
				foreach ($xml->children() as $category) {
					$pattern = $category->pattern;
					$template = $category->template;
					$sql = "INSERT INTO aiml(pattern, template, filename)
					VALUE ('$pattern', '$template', '$file')";
					$conn->query($sql);
				}
				$conn->close();
			}
		?>
		<div class="center">

			<form action="mod.php" method="post">
				<label>Type aiml file path to import to datasbase</label>
				<input type="file" name="file">
				<input type="submit" value="Import" name="import">
			</form>
		</div>
	</body>
</html>