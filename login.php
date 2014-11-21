<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? AND password = ?');
	$stmt->execute(array($username, $password));

	while ($row = $stmt->fetch()) {
 	 if ($row['username'] === $username and $row['password'] === $password)
 	 	echo ("Welcome back, " . $row['username'] . '!');
 	 if ($row['username'] != $username and $row['password'] != $password)
 	  echo ('Sorry bro, wrong username or password :(');
	}

?>