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
	  	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	  	<script type="text/javascript" src="JavaScript/showGraph.js"></script>
		<?php  echo "<input type='hidden' id='quest' value='".$_GET['quest']."'><input type='hidden' id='questname' value='".$_GET['name']."'>"  ?>
		<div class="wrapper">
		<header>
			<a href="main.php" class="header_img"><img src="Icons/icon.png" alt="Pollaux" height="25" width="25"></a>
			<a hreh="main.php"><b class="header_title"> Pollaux</b></a>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<ul class="list">
    		<?php echo '<a href="showPoll.php?poll='.$_GET['val'].'"><li class="back">Back</li></a>'?>
		</ul>
		<div id="grafico" style="margin-top: 28px; margin-left: 270px; width: 80%; height: 550px;">
		</div>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
		</div>
	</body>
</html>