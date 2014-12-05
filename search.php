<?php

$db = new PDO('sqlite:Database/database.db');

if(isset($_GET['res'])){
  
  $search = $_GET['res'];

  if($search == "allPolls"){
    if(isset($_GET['user'])){
       $stmt = $db->prepare('SELECT * FROM poll WHERE idAccount=?');
       $stmt->execute(array($_GET['user']));
     }
    else{
  	   $stmt = $db->prepare('SELECT * FROM poll WHERE public=?');
  	$stmt->execute(array('public'));
  }
  }
  else{
    if(isset($_GET['user'])){
  $stmt = $db->prepare('SELECT * FROM poll WHERE title Like ? AND idAccount=?');
  $stmt->execute(array('%'.$search.'%',$_GET['user']));
}
else{
   $stmt = $db->prepare('SELECT * FROM poll WHERE title Like ? and public=?');
  $stmt->execute(array('%'.$search.'%','public'));
}
}
$res="";
  while($row = $stmt->fetch()){
    if(!isset($_GET['user']))
      $res .= '<a href="showPoll.php?poll='. $row['title'].'"><li class="pollRes">'.$row['title'].'</li></a><br>';
    else
      $res .= '<li class="pollRes" id="manage'.$row['idPoll'].'" onclick="manage'.$row['idPoll'].'">'.$row['title'].'</li><br>';
    
  }

  echo  $res;
}
?>