<?php

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['usernameR'];
	$email = $_POST['emailR'];
	$password = $_POST['passwordR'];

	$check = 0;
	$stmt1 = $dbh->prepare('SELECT username, email FROM account WHERE username = ? AND email = ?');
	$stmt1->execute(array($username, $email));

	echo 'asd';
	while ($row = $stmt1->fetch()) {
		echo ($username);
 		if (in_array($username, $row)) {
 			$check = 1;
 			echo 'You are already registered';
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

		echo 'You have successfuy created a new account. Welcome to your website ' . $username . '!';
	}

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