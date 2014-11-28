<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameL'];
	$password = $_POST['passwordL'];

	$salt1 = "a)x%5";
	$salt2 = "p!y@*";
	$incrip = hash('ripemd128', "$salt1$password$salt2");

	$check = 0;
	$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? AND password = ?');
	$stmt->execute(array($username, $incrip));

	while ($row = $stmt->fetch()) {
		//print_r($row);
 		if (in_array($username, $row)) {
 			if ($incrip === $row['password']) {
 				$check = 1;
 				printf ("Welcome back, %s!", $row['username']);
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

<html lang="en">
  <head>
    <title>Back to the form</title>
    <meta charset="utf-8">
  </head>

  <body>
  	<br>
 	<a href="/LTW/index.html"> ---Back--- </a>
  </body>
</html>