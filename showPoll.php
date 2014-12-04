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
	  	<script type="text/javascript" src="JavaScript/showPoll.js"></script>
		
		<?php  echo "<input type='hidden' id='poll' value='".$_GET['poll']."'>"  ?>
		<div class="wrapper">
		<header>
			<img class="header_img" src="Icons/icon.png" 
				 alt="Pollaux" height="25" width="25">
			<a hreh="main.php"><b class="header_title"> Pollaux</b></a>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<ul class="list">
    		<a href="main.php"><li class="create">Back</li></a>
		</ul>
		<div id="polls">
		</div>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>