<?php

$db = new PDO('sqlite:Database/database.db');

$stmt = $db->prepare('SELECT * FROM answer WHERE idQuestion = ?');

$questid = $_GET['id'];

$stmt->execute(array($questid));


$row=$stmt->fetch();
$ans = array(array($row['aText'],$row['votes']));
while($row=$stmt->fetch()){
$temp=array($row['aText'],$row['votes']);
array_push($ans,$temp);
}
echo json_encode($ans);

?>