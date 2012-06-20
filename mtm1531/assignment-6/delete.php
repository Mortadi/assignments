<?php
require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)){
	header('location: index.php');
	exit;
}
$sql = $db->prepare('
DELETE FROM list_of_movies
WHERE id = :id 
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
header('location: index.php');
	exit;