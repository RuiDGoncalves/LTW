<?php

session_start();

$db = new PDO('sqlite:Database/database.db');
$db->exec( 'PRAGMA foreign_keys = ON;' );
$row=0;
$chk = $db->prepare('SELECT idAccount FROM account WHERE username = ?');
	if(isset($_COOKIE['username'])){
		$chk->execute(array($_COOKIE['username']));
		$row = $chk->fetch();
	}
	else if(isset($_SESSION['username'])){
		$chk->execute(array($_SESSION['username']));
		$row = $chk->fetch();
	}

	
echo $row[0];
	
?>