<?php
	
	session_start();

	if(isset($_SESSION['username']) || isset($_COOKIE['username'])) {
		header("Location: main.php");
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pollaux</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/index.css" hreflang="en">
		<link rel="shortcut icon" href="Icons/icon.png">
	</head>

	<body>
		<div class="wrapper">
		<header>
			<img class="header_img" src="Icons/icon.png" 
				 alt="Pollaux" height="25" width="25">
			<b class="header_title">Pollaux</b>
		</header>
		<nav>
			<h1>Pollaux</h1>
			<div class="login">
				<form class="form" id="formlog" action="loginHandle.php" method="post">
					<input type="text" id="username" name="usernameL" placeholder="Username" required>
					<input type="password" id="password" name="passwordL" placeholder="Password" required>
					<input type="checkbox" id="checkbox" name="remember"> Remember me
					<input type="submit" id="submit" value="Log in!">
				</form>
			
			<p>Register here</p>
			<a class="button" id="reg" href="index.php">Register</a>	
			</div>				
		</nav>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>