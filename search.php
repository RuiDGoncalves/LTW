<?php

$db = new PDO('sqlite:Database/database.db');

if(isset($_GET['res'])){
  
  $search = $_GET['res'];

  if($search == "allPolls"){
  	$stmt = $db->prepare('SELECT * FROM poll');
  	$stmt->execute(array());
  }
  else{
  $stmt = $db->prepare('SELECT * FROM poll WHERE title Like ? and public=?');
  $stmt->execute(array('%'.$search.'%','public'));
}
$res="";
  while($row = $stmt->fetch()){
    $res .= '<a href="showPoll.php?poll='. $row['title'].'"><li class="pollRes">'.$row['title'].'</li></a><br>';

  }

  echo  $res;
}
?>