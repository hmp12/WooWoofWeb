<?php
	include '../php/init.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<title>GauGau Bot</title>
		<?php include '../html/head.html';?>
		<script type="text/javascript" src="../js/chatbot.js"></script>
	</head>

	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="page">
			<div class="top">
				<div class="wrapper">
					<div class="chatbox"></div>
				</div>
			</div>
			<div class="bottom">
				<form method="post" name="talkform" id="talkform" action="" onsubmit="return false;">
					<input type="text" placeholder="Say someting" id="body">
					<input type="submit" value="Say" name="submit" class="button" id="say">
				</form>
	        </div>
	    </div>
	</body>
</html>