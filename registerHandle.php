<?php

	session_start();

	if(isset($_SESSION['username']) || isset($_COOKIE['username'])) {
		header("Location: main.php");
		exit();
	}

	$dbh = new PDO('sqlite:Database/database.db');

	$username = $_POST['usernameR'];
	$email = $_POST['emailR'];
	$password = $_POST['passwordR'];
	//print($username);
	//print($email);
	$check = 0;

	$stmt1 = $dbh->prepare('SELECT username, email FROM account WHERE username == ? or email == ?');
	$stmt1->execute(array($username, $email));
	$result = $stmt1->fetchAll();

	foreach ($result as $row) {
		//echo ($row['username']);
 		if (in_array($username, $row) || in_array($email, $row)) {
 			$check = 1;
 			header("Location: index.php");
 			break;
 		}
 		
	}

	if($check == 0) {

		$idAccount=0;
		$id1 = $dbh->prepare("SELECT count(*) FROM account");
		$id1->execute();
		$id2 = $id1->fetch();
		
		$salt1 = "a)x%5";
		$salt2 = "p!y@*";
		$incrip = hash('ripemd128', "$salt1$password$salt2");

		$stmt2 = $dbh->prepare('INSERT INTO account (idAccount, username, email, password) VALUES (?, ?, ?, ?)');
		$stmt2->execute(array($id2[0]+1, $username, $email, $incrip));

		$_SESSION['username'] = $username;

 		header("Location: main.php");
 		exit();
	}

?>