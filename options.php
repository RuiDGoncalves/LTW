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
		<link rel="stylesheet" href="CSS/options.css" hreflang="en">
		<link rel="shortcut icon" href="Icons/icon.png">
	</head>

	<body>
		
		<div class="wrapper">
		<header>
			<a href="main.php" class="header_img"><img src="Icons/icon.png" alt="Pollaux" height="25" width="25"></a>
			<b class="header_title"> Pollaux</b>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<p id="user"> Hi, <?php 
							if(isset($_SESSION['username'])) 
								echo($_SESSION['username']); 
							else
								echo($_COOKIE['username']); ?></p>
		<ul class="list">
    		<a href="manage.php"><li class="manage">Back</li></a>
		</ul>
		<p><h1>  d  </h1></p>
		<?php echo '<a href="showPoll.php?poll='.$_GET['name'].'" class="view">View Poll</a>' ?>
		<?php echo '<a href="delete.php?id='.$_GET['id'].'" class="delete">Delete Poll</a>' ?>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>