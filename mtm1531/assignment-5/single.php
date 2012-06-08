<?php 
require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = $db->prepare('
SELECT id, title, genre, directed_by, release_date, starring
FROM list_of_movies
WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();


?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $results['title']; ?> Movies</title>
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
</head>



<body>

<h1><?php echo $results['title']; ?></h1>
<dl>
<dt>genre:</dt>
<dd><?php echo $results ['genre']; ?></dd>
<dt>directed_by:</dt>
<dd><?php echo $results['starring']; ?></dd>
<dt>starring:</dt>
<dd><?php echo $results ['genre']; ?></dd>
<dt>release_date:</dt>
<dd><?php echo $results['release_date']; ?></dd>




</dl>
<a href="delete.php?id=<?php echo $id; ?>">Delete</a>
</body>
</html>


 	 	