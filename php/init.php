<?php
	include '../php/session.php';
	$session = new Session();
	$session->start();
	$user = $session->get();

	include '../php/database.php';
	$db = new Database();
	$db->connect();
?>