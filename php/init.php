<?php
	include '../php/session.php';
	$session = new Session();
	$session->start();
	$usr = $session->get();

	include '../php/database.php';
	$db = new Database();
	$db->connect();
?>