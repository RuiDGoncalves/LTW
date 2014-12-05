<?php
session_start();
	
if(!(isset($_SESSION['username']) || isset($_COOKIE['username']))) {
	echo 0;
	exit();
	}
else{
$db = new PDO('sqlite:Database/database.db');
$stmt2 = $db->prepare('SELECT idAccount FROM account WHERE username = ?');
if(isset($_SESSION['username']))
	$stmt2->execute(array($_SESSION['username']));
else
	$stmt2->execute(array($_COOKIE['username']));
$idUser = $stmt2->fetch()['idAccount'];
$stmt = $db->prepare('SELECT * FROM answer WHERE idQuestion = ?');
$pollQuest = $_GET['quest'];
$stmt->execute(array($pollQuest));
while($row=$stmt->fetch()){
	$stmt1 = $db->prepare('SELECT * FROM rela WHERE idAnswer = ?');
	$stmt1->execute(array($row['idAnswer']));
	while($row1=$stmt1->fetch()){
		if($row1['idAccount']==$idUser){
			echo $row1['idAnswer'];
			exit();
		}
	}
}
}
?>