<?php

	session_start();

	if(isset($_SESSION['username']) || isset($_COOKIE['username'])) {
		header("Location: main.php");
		exit();
	}

	$dbh = new PDO('sqlite:Database/database.db');

	$username = $_POST['usernameL'];
	$password = $_POST['passwordL'];
	$remember = $_POST['remember'];
	$salt1 = "a)x%5";
	$salt2 = "p!y@*";
	$incrip = hash('ripemd128', "$salt1$password$salt2");

	$stmt = $dbh->prepare('SELECT username, password FROM account WHERE username = ? and password = ?');
	$stmt->execute(array($username, $incrip));

	while ($row = $stmt->fetch()) {
 		if (in_array($username, $row)) {
 			
 			if ($incrip === $row['password']) {

 				if($remember == "0")
 					setcookie("username", $username, time() + 3600);
 				else{
 					
 					setcookie("username", $username);
 				}

 				header("Location: main.php");
 				exit();
 			}
 		}
	}
	header("Location: loginPage.php");
	echo "<SCRIPT>alert('Incorrect username or password.');</SCRIPT>";
	
?>