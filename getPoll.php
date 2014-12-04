<?php

$db = new PDO('sqlite:Database/database.db');

$stmt = $db->prepare('SELECT * FROM Poll WHERE title = ?');

$pollName = $_GET['poll'];

$stmt->execute(array($pollName));

$result = $stmt->fetch();
$res='<h1 class="titulo">'.$result['title'].'</h1>';
$res.='<img class="image" src="'.$result['image'].'">';

$stmt = $db->prepare('SELECT * FROM question WHERE idPoll = ?');
$stmt->execute(array($result['idPoll']));

while($row = $stmt->fetch()){
	$stmt1 = $db->prepare('SELECT * FROM answer WHERE idQuestion = ?');
	$stmt1->execute(array($result['idPoll']));
	$res.='<h3 class="pergunta">'.$row['qText'].'</h3><ul class="listanswer">';
	while($row1 = $stmt1->fetch()){
		$res.='<li class="answer">'.$row1['aText'].'</li>';
	}
	$res.='</ul>';
}
echo $res;
?>