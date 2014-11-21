<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameP'];
	$email = $_POST['emailP'];
	$password = $_POST['passwordP'];
	$id = 4;

	$stmt = $dbh->prepare('INSERT INTO person (idAccount, username, email, password) VALUES (?, ?, ?, ?)');
	$stmt->execute(array($id, $username, $email, $password));

	echo ('You have successfuy created a new account. Welcome to your website');

?>