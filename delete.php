<?php

function removePoll($idPoll) {

  global $db;
  
  $stmt = $db->prepare('SELECT idQuestion FROM question WHERE idPoll = ?');
  $stmt = $db->execute($idPoll);
  $idQuestion = $stmt->fetch();

  //remove answers
  $stmt = $db->prepare('DELETE FROM answer WHERE idQuestion = ?');
  $stmt = $db->execute($idQuestion);
 
  //remove idPoll
  $stmt = $db->prepare('DELETE FROM question WHERE idPoll = ?');
  $stmt = $db->execute($idPoll);
 
  //remove poll
  $stmt = $db->prepare('DELETE FROM poll WHERE idPoll = ?');
  $stmt->execute($idPoll);
 
  return true;
}

?>