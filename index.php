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
			<div class="register">
				<form class="form" id="formreg" action="registerHandle.php" method="post">
					<input type="text" id="username" name="usernameR" placeholder="Username" required><br>
					<input type="email" id="email" name="emailR" placeholder="Email" required><br>
					<input type="password" id="password" name="passwordR" maxlength="8" placeholder="Password" required><br>
					<input type="submit" id="submit" value="Register!"><br>
				</form>
			
			<p>If you already have an account</p>
			<a class="button" id="log" href="loginPage.php">Log in</a>
			</div>
		</nav>
		<footer>
			<p>2014 Pollaux © All rights reserved.</p>
		</footer>
		</div>
	</body>
</html>


