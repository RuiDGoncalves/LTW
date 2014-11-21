<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameL'];
	$password = $_POST['passwordL'];

	$check = 0;
	$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? AND password = ?');
	$stmt->execute(array($username, $password));

	while ($row = $stmt->fetch()) {
		//print_r($row);
 		if (in_array($username, $row)) {
 			if ($password === $row['password']) {
 				$check = 1;
 				echo ("Welcome back, " . $row['username'] . '!');
 				break;
 			}
 			//else echo("asd");
 		}
 		//echo("asd");
	}
	if($check == 0)
		echo('Sorry bro, wrong username or password :(');

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