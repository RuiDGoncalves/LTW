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

		<div class="addthis_sharing_toolbox" style="z-index: 20000;"></div>

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
			<li class="search">
				<form class="form1" id="formlog" action="search.php" method="post">
					<input type="text" id="search1" name="searchL" placeholder="Search Polls" required>
				</form>
			</li>
    		<a href="manage.php"><li class="manage">Manage</li></a>
    		<a href="create.php"><li class="create">Create</li></a>
    	<!--	<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=youremail@gmail.com&body=Please visit the best poll site ever https://www.pollaux.com   "><img src="http://media.idownloadblog.com/wp-content/uploads/2013/11/Gmail-2.7182-for-iOS-app-icon-small-55x55.png"/></a> -->

		</ul>
		<p class="ti">Pollaux</p>
		<ul id="polls">
		</ul>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>

		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5480f58b7bf6b6fb" async="async"></script>
	</body>
</html>
