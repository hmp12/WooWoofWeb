<?php
	include 'database.php';
	$db = new Database();
	$db->connect();
	$sql = "CREATE TABLE photos (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	url VARCHAR(100) NOT NULL,
	type INT(11) NOT NULL,
	size INT(11) NOT NULL,
	reg_date TIMESTAMP
);";
	$db->query($sql);
	echo $db->error();
	$db->close();
?>