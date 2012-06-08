<?php
require_once 'includes/db.php';
$sql = $db->query('
SELECT id, title, genre, directed_by, release_date, starring
FROM list_of_movies
ORDER BY title ASC
');

$resultes = $sql->fetchAll();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Movies</title>
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
</head>

<body>
<h1>'List of July movies 2012'</h1>
<?php foreach ($resultes as $movie) : ?>

<h2>
<a href="single.php?id=<?php echo $movie['id']; ?>"><?php echo $movie['title']; ?></a></h2>
<dl>
<dt>Genre:</dt>
<dd><?php echo $movie ['genre']; ?></dd>
<dt>Directed By:</dt>
<dd><?php echo $movie['directed_by']; ?></dd>
<dt>Starring:</dt>
<dd><?php echo $movie ['starring']; ?></dd>
<dt>Release Date:</dt>
<dd><?php echo $movie['release_date']; ?></dd>

</dl>
<?php endforeach; ?>


</body>
</html>





