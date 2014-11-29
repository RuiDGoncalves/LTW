<?php

	session_start();

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameL'];
	$password = $_POST['passwordL'];

	$salt1 = "a)x%5";
	$salt2 = "p!y@*";
	$incrip = hash('ripemd128', "$salt1$password$salt2");

	$check = 0;
	$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? and password = ?');
	$stmt->execute(array($username, $incrip));

	while ($row = $stmt->fetch()) {
 		if (in_array($username, $row)) {
			//echo ($row['password'] . '<br>');
			//echo ($_SESSION['usernameL']);
 			if ($incrip === $row['password']) {
 				$_SESSION['username'] = $username;
 				$loggin_session = $_SESSION['username'];
 				$check = 1;
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
    <title>Pollaux</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="icon.png">
  </head>

  <body>
  	<br>
  	Welcome back <?php echo $username; ?>
 	<a href="logout.php">Log Out</a>
  </body>
</html>