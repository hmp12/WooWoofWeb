<?php
	include '../php/session.php';
	$session = new Session();
	$session->start();
	if ($session->get() != '') $logged_in = True;
	else $logged_in = False;
?>
<!DOCTYPE html>

<html>
	<head>
		<title>GauGau Bot</title>
		<?php
			include '../html/head.html';
		?>
	</head>
	<?php
		$man_say = "";
		$dog_say = "Hi";
		if (isset($_POST["say"])) {
			include "../php/connectDB.php";
			$man_say = $_POST["say"];
			$sql = "SELECT pattern, template FROM aiml
			WHERE pattern = '$man_say'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()){
					$dog_say = $row["template"];
				}
			}
			else {
				$dog_say = "I don't understand";
			}
			$conn->close();
		}
	?>
	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="top">
			<div class="left">
				<div class="man">
					<h1 id="man_say"><?php echo $man_say?></h1>
					<img src="../img/question.svg" height="80%">
				</div>
			</div>
			<div class="right">
				<div class="dog">
					<h1 id="dog_say"><?php echo $dog_say?></h1>
					<img src="../img/gaugau1.png" height="80%">
				</div>
			</div>
		</div>
		<div class="bottom">
			<form method="post" name="talkform" id="talkform" action="index.php">
				<input type="text" placeholder="Say someting" name="say" id="say">
				<input type="submit" value="Say" name="submit" id="submit">
			</form>
			<form name="mod" action="mod.php" id="mod">
				<input type="submit" value="Modify Bot" name="mod">
			</form>
        </div>
	</body>
</html>