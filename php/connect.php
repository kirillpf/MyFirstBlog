<?php
	/*$adapter = "mysql";
	$host = "localhost";
	$dbname = "id13126182_blog_db";
	$user = 'id13126182_kirill';
	$password = '6pVw+I<E2rVzB!UI';*/ 
	$adapter = "mysql";
	$host = "localhost";
	$dbname = "blog_db";
	$user = 'root';
	$password = '';

	try {
		$pdo = new PDO("$adapter:host=$host;dbname=$dbname;", $user, $password);
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
        die();
	}
?>