<?php
require_once 'includes/db.php';
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);	
$sql = $db->prepare('SELECT id FROM names WHERE username = :username'); 
$sql->bindValue(':username', $username, PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetch();
if (empty($result))
	echo 'available';
else
	echo 'unavailable';
