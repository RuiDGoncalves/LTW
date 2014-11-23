<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameR'];
	$email = $_POST['emailR'];
	$password = $_POST['passwordR'];

	$check = 0;
	$stmt1 = $dbh->prepare('SELECT username FROM account WHERE username = ?');
	$stmt1->execute(array($username));
	$result = $stmt1->fetchAll();

	foreach ($result as $row) {
		//echo ($row['username']);
 		if (in_array($username, $row)) {
 			$check = 1;
 			echo "That username has already been taken <br>
 				  Please, choose another one";
 			break;
 		}	
 			
	}

	if($check == 0) {

		$idAccount=0;
		$id1 = $dbh->prepare("SELECT count(*) FROM account");
		$id1->execute();
		$id2 = $id1->fetch();
		//echo $id3[0];

		$stmt2 = $dbh->prepare('INSERT INTO account (idAccount, username, email, password) VALUES (?, ?, ?, ?)');
		$stmt2->execute(array($id2[0], $username, $email, $password));

		printf ("You've successfuy created a new account. Welcome to your website %s!", $username);
	}

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