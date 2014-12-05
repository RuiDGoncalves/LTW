<?php

  $db = new PDO('sqlite:Database/database.db');
  $idPoll=$_GET['id'];

  $stmt = $db->prepare('SELECT * FROM poll WHERE idPoll = ?');
  $stmt->execute(array($idPoll));
  $idAccount = $stmt->fetch()['idAccount'];  

  $stmt1 = $db->prepare('SELECT * FROM question WHERE idPoll = ?');
  $stmt1->execute(array($idPoll));
  while($idQuestion = $stmt1->fetch()['idQuestion']){
    $stmt2 = $db->prepare('SELECT * FROM answer WHERE idQuestion = ?');
    $stmt2->execute(array($idQuestion));
    
    while($idAnswer = $stmt2->fetch()['idAnswer']){
    $stmt = $db->prepare('DELETE FROM rela WHERE idAnswer = ?');
    $stmt->execute(array($idAnswer));
  }
  //remove answers
  $stmt = $db->prepare('DELETE FROM answer WHERE idQuestion = ?');
  $stmt->execute(array($idQuestion));
 }
  //remove question
  $stmt = $db->prepare('DELETE FROM question WHERE idPoll = ?');
  $stmt->execute(array($idPoll));
 
  //remove poll
  $stmt = $db->prepare('DELETE FROM poll WHERE idPoll = ?');
  $stmt->execute(array($idPoll));
 
header("Location: main.php");
?>