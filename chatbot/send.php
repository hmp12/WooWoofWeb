<?php
	include '../php/init.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo 'aaa';
		if (isset($_POST['body'])) {
			echo 'aaa';
			$body = $_POST['body'];
			$sql = "INSERT INTO messages (body, user)
				VALUES ('$body', '$user')";	
			$db->query($sql);	

			include '../php/bot.php';
			$bot = new Bot();
			$bot_mess = $bot->chat($db, $body);
			echo $bot_mess;
			$sql = "INSERT INTO messages (body, user)
					VALUES ('$bot_mess', 'bot')";
			$db->query($sql);	
			echo $db->error();
			$db->close();
		}		
	}
?>