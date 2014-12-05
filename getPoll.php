<?php

$db = new PDO('sqlite:Database/database.db');

$stmt = $db->prepare('SELECT * FROM Poll WHERE title = ?');

$pollName = $_GET['poll'];

$stmt->execute(array($pollName));

$result = $stmt->fetch();
$res='<h1 class="titulo" id="tit">'.$result['title'].'</h1>';
$res.='<img class="image" src="'.$result['image'].'">';

$stmt = $db->prepare('SELECT * FROM question WHERE idPoll = ?');
$stmt->execute(array($result['idPoll']));

while($row = $stmt->fetch()){
	$stmt1 = $db->prepare('SELECT * FROM answer WHERE idQuestion = ?');
	$stmt1->execute(array($row['idQuestion']));
	$res.='<a href="showGraph.php?quest='.$row['idQuestion'].'&name='.$row['qText'].'&val='.$result['title'].'"><h3 class="pergunta" id="pergunta'.$row['idQuestion'].'">'.$row['qText'].'</h3></a><ul class="listanswer">';
	while($row1 = $stmt1->fetch()){
		$res.='<li class="answer" id="'.'answer'.$row1['idAnswer'].'"onclick="vote('.'answer'.$row1['idAnswer'].')">'.$row1['aText'].'</li>';
	}
	$res.='</ul><script>getvoteuser('.'pergunta'.$row['idQuestion'].')';


}
echo $res;
?>