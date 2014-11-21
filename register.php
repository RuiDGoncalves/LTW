<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameP'];
	$email = $_POST['emailP'];
	$password = $_POST['passwordP'];

	$idAccount=0;
	$id1 = $dbh->prepare("SELECT count(*) FROM account");
	$id1->execute();
	$id3 = $id1->fetch();
	echo $id3[0];

	$stmt = $dbh->prepare('INSERT INTO account (idAccount, username, email, password) VALUES (?, ?, ?, ?)');
	$stmt->execute(array($id3[0], $username, $email, $password));

	echo ('You have successfuy created a new account. Welcome to your website');

?>