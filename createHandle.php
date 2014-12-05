<?php

session_start();

$db = new PDO('sqlite:Database/database.db');
$db->exec( 'PRAGMA foreign_keys = ON;' );

function add_question() {

	$questions = array(array());
	$q = 0;

	while(isset($_POST ['question'.$q])){
		$questions[$q][0] = $_POST ['question'.$q];
		$a=1;
		while(isset($_POST['answer'.$q.($a-1)])){
			$questions[$q][$a] = $_POST['answer'.$q.($a-1)];
			$a++;
		}
		$q++;
	}
	return $questions;
}

function insert($idPoll, $question) {

	global $db;

	$ins = $db->prepare('INSERT INTO question (idPoll, qText) VALUES (?, ?)');
	$ins -> execute(array($idPoll, $question[0]));

	$chk = $db->prepare('SELECT * FROM question WHERE qText = ?');
	$chk->execute(array($question[0]));
	$row = $chk->fetch();

	for($i = 1; $i < count($question); $i++) {
		$ins1 = $db->prepare('INSERT INTO answer (idQuestion, aText,votes) VALUES (?, ?, ?)');
		$ins1->execute(array($row['idQuestion'], $question[$i],'0'));
	}
}


function create_poll() {

	global $db;

	
	$chk = $db->prepare('SELECT * FROM account WHERE username = ?');
	if(isset($_COOKIE['username'])){
		$chk->execute(array($_COOKIE['username']));
	}
	else{
		$chk->execute(array($_SESSION['username']));
	}

	$row = $chk->fetch();
	
	if($_POST['check']=="0"){
		$public="public";
	}
	else{
		$public="private";
	}

	$target_file = "uploads/" . basename($_FILES["imageL"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(isset($_POST["submit"])) {
   		$check = getimagesize($_FILES["imageL"]["tmp_name"]);
    	if($check == false){
        	echo "File is not an image.";
        	$uploadOk = 0;
    	}
    }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    move_uploaded_file($_FILES["imageL"]["tmp_name"], $target_file);
}

	$idAccount = $row['idAccount'];
	$name = $_POST['titleL'];

	$check = 0;

	$sta = $db->prepare('SELECT title FROM poll WHERE title = ?');
	$sta->execute(array($name));
	$res = $sta->fetchAll();

	foreach ($res as $row) {
 		if (in_array($name, $row)) {
 			$check = 1;
 			break;
 		}
 		
	}

	if ( $check == 0 ) {

		$stmt2 = $db->prepare('INSERT INTO poll (idAccount,title,image,public) VALUES (?, ?, ?, ?)');
		$stmt2->execute(array($idAccount, $name, $target_file, $public));

		$questions = add_question();

		$chk = $db->prepare('SELECT * FROM poll WHERE title = ?');
		$chk->execute(array($name));
		$row = $chk->fetch();
		for($i = 0; $i < count($questions); $i++) {
			insert($row['idPoll'], $questions[$i]);
		}
	}

}

create_poll();
sleep(2);
header("Location: main.php");
?>