<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameP'];
	$email = $_POST['emailP'];
	$password = $_POST['passwordP'];

	$id = $dbh->prepare('SELECT max(idAccount) FROM account');
	//$stmt++;
	//echo $id;
$id = NULL;
	$stmt = $dbh->prepare('INSERT INTO account (idAccount, username, email, password) VALUES (?, ?, ?, ?)');
	echo $username . $password . $email;
	$stmt->execute(array($id, $username, $email, $password));

	//echo ('You have successfuy created a new account. Welcome to your website');

?>