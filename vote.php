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
	$stmt3 = $db->prepare('SELECT idQuestion FROM answer WHERE idAnswer =?');
	$stmt3->execute(array($_GET['poll']));
	$stmt4 = $db->prepare('SELECT * FROM answer WHERE idQuestion =?');
	$stmt4->execute(array($stmt3->fetch()['idQuestion']));
	$stmt = $db->prepare('SELECT * FROM rela WHERE idAccount=?');
	$stmt->execute(array($idUser));

	$count=0;
	$row1=$stmt4->fetchAll();
	while($row=$stmt->fetch()){
		$i=0;
		while($i<count($row1)){
			if($row1[$i]['idAnswer']==$row['idAnswer'])
				$count++;
			$i++;
		}		
	}

	if($count==0){
		$stmt = $db->prepare('INSERT INTO rela(idAnswer,idAccount) VALUES (?,?)');
		$stmt->execute(array($_GET['poll'],$idUser));
		$stmt1 = $db->prepare('UPDATE answer SET votes=votes+1 WHERE idAnswer=?');
		$stmt1->execute(array($_GET['poll']));
		echo 1;
		exit();
	}
	else 
		echo 0;

}
?>