<?php
	class Post {
		private $db;

		function Post($db) {
			$this->db = $db;
		}

		function add() {

		}

		function delete($tab, $array) {
			foreach ($array as $key => $id) {
				$sql = "SELECT * FROM $tab WHERE id = '$id'";
				$data = $this->db->query($sql);
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
						$this->db->query($sql);
					}
				}
			}
		}
	}
?>