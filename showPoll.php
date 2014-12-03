<?php

$db = new PDO('sqlite:Database/database.db');

$stmt = $db->prepare('SELECT * FROM Poll WHERE title = ?');

$pollName = $_GET['poll'];

$stmt->execute(array($pollName));

$result = $stmt->fetch();

echo $result['title'];

?>