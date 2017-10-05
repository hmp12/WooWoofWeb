<?php
	include '../php/init.php';
	$sql = "SELECT * FROM messages";
	$data = $db->query($sql);
	if ($data->num_rows > 0) {
		while ($row = $data->fetch_assoc()) {
			if ($row['body'] != '') {
				if ($row['user'] == $user) {
					echo '
						<div class="message">
							<div class="right_mess">
								<p>'.$row['body'].'</p>
							</div>
						</div>
					';
				} 
				else if ($row['user'] == 'bot') {
					echo '
						<div class="message">
							<div class="left_mess">
								<p>'.$row['body'].'</p>
							</div>
						</div>
					';
				}
			}
		}
	}
?>