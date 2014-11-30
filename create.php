<?php

session_start();

$db = new PDO('sqlite:database.db');

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

	$ins = $db->prepare('INSERT INTP question (idPoll, question) VALUES (?, ?)');
	$ins = execute(array($idPoll, $question[0]));

	for($i = 1; $i < count($question); $i++) {

		$chk = $db->prepare('SELECT * FROM question WHERE question = ?');
		$chk->execute(array($question[0]));
		$row = $chk->fetch();

		$ins = $db->prepare('INSERT INTO answer (idQuestion, answ) VALUES (?, ?)');
		$ins->execute(array($row['idQuestion'], $question[$i]));
	}
}


function create_poll() {

	global $db;

	$chk = $db->prepare('SELECT * FROM account WHERE username = ?');

	$chk->execute(array($_SESSION['username']));

	$row = $chk->fetch();

	$ins = $db->pepare('INSERT INTO poll (idAccount, title) VALUES (?, ?)'); 

	$idUser = $row['idUser'];
	$title = $_POST['title'];

	$ins->execute(array($idUser, $title));

	$questions = add_question();

	for($i = 0; $i < count($questions); $i++) {

		$chk = $db->prepare('SELECT * FROM poll WHERE title = ?');
		$chk->execute(aray($title));
		$row = $chk->fetch();

		insert($row['idPoll'], $questions[$i]);
	}
}

create_poll();

?>