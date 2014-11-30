<?php

session_start();

$db = new PDO('sqlite:Database/database.db');

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

	$chk->execute(array($_SESSION['username']));

	$row = $chk->fetch();

	$ins = $db->prepare('INSERT INTO poll (idAccount,name) VALUES (?, ?)'); 

	$idAccount = $row['idAccount'];
	$name = $_POST['name'];

	$ins->execute(array($idAccount, $name));

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