<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['action'] == "delete") {
			include '../php/init.php';
			include '../php/post.php';
			$post = new Post($db);
			$post->delete($tab, $_POST['id']);
		}
	}
?>