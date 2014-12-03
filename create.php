<?php

session_start();

$db = new PDO('sqlite:Database/database.db');
$db->exec( 'PRAGMA foreign_keys = ON;' );

function add_question() {

	$questions = array(array());
	$i = 0;

	$questions[0][0] = $_POST ['question1'];

	while(isset($_POST['answer'.$i])){

		$question[0][$i] = $_POST['answer'.$i];
		$i++;
	}

	return $questions;
}

function insert($idPoll, $question) {

	global $db;

	$ins = $db->prepare('INSERT INTO question (idPoll, qText) VALUES (?, ?)');
	$ins = execute(array($idPoll, $question[0]));

	for($i = 1; $i < count($question); $i++) {

		$chk = $db->prepare('SELECT * FROM question WHERE qText = ?');
		$chk->execute(array($question[0]));
		$row = $chk->fetch();

		$ins = $db->prepare('INSERT INTO answer (idQuestion, qText) VALUES (?, ?)');
		$ins->execute(array($row['idQuestion'], $question[$i]));
	}
}


function create_poll() {

	global $db;

	$chk = $db->prepare('SELECT * FROM account WHERE username = ?');

	$chk->execute(array($_COOKIE['username']));

	$row = $chk->fetch();
	
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

	$stmt2 = $db->prepare('INSERT INTO poll (idPoll,idAccount,title,image) VALUES (?, ?, ?, ?)');
	$stmt2->execute(array($idAccount, $idAccount, $name, $target_file));

	$questions = add_question();

	for($i = 0; $i < count($questions); $i++) {

		$chk = $db->prepare('SELECT * FROM poll WHERE name = ?');
		$chk->execute(aray($name));
		$row = $chk->fetch();

		insert($row['idPoll'], $questions[$i]);
	}

}

create_poll();

?>