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
		<link rel="stylesheet" href="CSS/create.css" hreflang="en">
		<link rel="shortcut icon" href="Icons/icon.png">
	</head>

	<body>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	  	<script type="text/javascript" src="JavaScript/add.js"></script>
		<div class="wrapper">
		<header>
			<a href="main.php" class="header_img"><img src="Icons/icon.png" alt="Pollaux" height="25" width="25"></a>
			<b class="header_title"> Pollaux</b>
			<a href="logout.php" class="logout"><img src="Icons/logout.png" height="25" width="25"></a>
		</header>
		<ul class="list">
    		<a href="main.php"><li class="back">Back</li></a>
		</ul>
		<form class="form" id="formlog" action="createHandle.php" method="post" enctype="multipart/form-data">
			<input type="text" id="title" name="titleL" placeholder="Title" required><br>
			<input type="file" id="submit1" name="imageL" value="image" accept="image/*"><br>
			<div id="multiple">
				<div id="dynamicQuestion0">
					<input type="text" class="question" name="question0" placeholder="Question" required>
					<input type="button" class="addquestion" value="+">
    				<input type="button" class="delquestion" value="x">
    				<br>
					<div id="dynamicAnswer0">
						<input type="text" class="answer" name="answer00" placeholder="Answer" required> 
						<input type="button" class="addanswer" value="+">
						<input type="button" class="delanswer" value="x">
						<br>
					</div>
				</div>
			</div>
			<input type="hidden" id="checkbox1" name="check" value="0" />
			<input type="checkbox" id="checkbox" name="check" value="1"> Private
			<br>
			<input type="submit" id="submit" value="Create">
		</form>		
		</div>
		<footer>
			<p>2014 Pollaux © All rights reserved. </p>
		</footer>
	</body>
</html>
