<?php 
	session_start();
	require_once 'connect.php';

	$id = $_GET['id'];

	$delete = $pdo->prepare("DELETE FROM `articles` WHERE `id` = ?");
	$delete->execute([$id]);

	header('Location: /articles.php');
?>