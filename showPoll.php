<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Pollaux</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/show.css" hreflang="en">
		<link rel="shortcut icon" href="Icons/icon.png">
	</head>

	<body>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	  	<script type="text/javascript" src="JavaScript/showPoll.js"></script>

		<div class="addthis_sharing_toolbox" style="z-index: 20000;"></div>

		<?php  echo "<input type='hidden' id='poll' value='".$_GET['poll']."'>"  ?>

		<div class="wrapper">
		<header>
			<a href="main.php" class="header_img"><img src="Icons/icon.png" alt="Pollaux" height="25" width="25"></a>
			<a hreh="main.php"><b class="header_title"> Pollaux</b></a>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<ul class="list">
    		<a href="main.php"><li class="back">Back</li></a>
		</ul>
		<div id="polls">
		</div>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5480f58b7bf6b6fb" async="async"></script>
	</body>
</html>