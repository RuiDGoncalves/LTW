<?php

	try {
		$dbh = new PDO('sqlite:database.db');

		$username = $_POST['username'];
		$password = $_POST['password'];

		$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? AND password = ?');
		$stmt->execute(array($username, $password));

		while ($row = $stmt->fetch()) {
			//print_r($row);
 			if (in_array($username, $row)) {
 				if ($password === $row['password']) {
 					echo ("Welcome back, " . $row['username'] . '!');
 					break;
 				}
 			}
		}
	}
	catch(Exception $e) {
		echo 'Error ' . $e->getMessage();
	}

	//echo ('Sorry bro, wrong username or password :(');	

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Back to the form</title>
    <meta charset="utf-8">
  </head>

  <body>
  	<br>
 	<a href="page.html"> ---Back--- </a>
  </body>
</html>