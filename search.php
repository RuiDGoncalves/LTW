<?php

$db = new PDO('sqlite:Database/database.db');
$stmt2 = $db->prepare('SELECT * FROM poll WHERE ');
$stmt2->execute(array('40', $name, $idAccount, $target_file));
?>