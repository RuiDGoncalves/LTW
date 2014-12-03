<?php

	session_start();
	
	if(!isset($_COOKIE['username'])) {
		header("Location: loginPage.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pollaux</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/main.css" hreflang="en">
		<link rel="shortcut icon" href="Icons/icon.png">
	</head>

	<body>
		<div class="wrapper">
		<header>
			<img class="header_img" src="Icons/icon.png" 
				 alt="Pollaux" height="25" width="25">
			<b class="header_title"> Pollaux</b>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<br><br>
		<!--<span id="user"> Hi, <?php echo("$username"); ?></span>-->
		<ul class="list">
			<li class="search">
				<form class="form1" id="formlog" action="search.php" method="post">
					<input type="text" id="search1" name="searchL" placeholder="Search Polls" required>
				</form>
			</li>
    		<a href=""><li class="manage">Manage</li></a>
    		<a href="create.html"><li class="create">Create</li></a>
		</ul>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>
