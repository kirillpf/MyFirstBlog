<?php 
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
