<?php

	session_start();
	
	if(!(isset($_SESSION['username']) || isset($_COOKIE['username']))) {
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	  	<script type="text/javascript" src="JavaScript/search.js"></script>
		
		<div class="wrapper">
		<header>
			<img class="header_img" src="Icons/icon.png" 
				 alt="Pollaux" height="25" width="25">
			<b class="header_title"> Pollaux</b>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<p id="user"> Hi, <?php echo($_SESSION['username']); ?></p>
		<ul class="list">
			<li class="search">
				<form class="form1" id="formlog" action="search.php" method="post">
					<input type="text" id="search1" name="searchL" placeholder="Search Polls" required>
				</form>
			</li>
    		<a href="manage.php"><li class="manage">Manage</li></a>
    		<a href="create.php"><li class="create">Create</li></a>
		</ul>
		<p class="ti">Pollaux</p>
		<ul id="polls">
		</ul>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>
