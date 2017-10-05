<?php
	include 'database.php';
	$db = new Database();
	$db->connect();
	$sql = "CREATE TABLE messages (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		body longtext NOT NULL,
		user VARCHAR(30) NOT NULL,
		reg_date TIMESTAMP
	);";
	$db->query($sql);
	echo $db->error();
	$db->close();
?>