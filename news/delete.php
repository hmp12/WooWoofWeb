<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['action'] == "delete") {
			include '../php/init.php';
			foreach ($_POST['id'] as $key => $id) {
				$sql = "SELECT * FROM $tab WHERE id = '$id'";
				$data = $db->query($sql);
				if ($data->num_rows > 0) {
					$row = $data->fetch_assoc();
					$valid = False;
					if ($tab == 'photos') {
						if (unlink('../../'.$row['url'])) {
							$valid = True;
						}
					}
					else {
						$valid = True;
					}
					if ($valid) {
						$sql = "DELETE FROM $tab WHERE id = '$id'";
						$db->query($sql);
					}
				}
			}
		}
	}
?>