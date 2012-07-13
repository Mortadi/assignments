<?php
require_once 'includes/db.php';
$sql = $db->query('
SELECT id, title, genre, directed_by, release_date, starring
FROM list_of_movies
ORDER BY title ASC
');

$resultes = $sql->fetchAll();
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
$directed_by = filter_input(INPUT_POST, 'directed_by', FILTER_SANITIZE_STRING);
$starring = filter_input(INPUT_POST, 'starring', FILTER_SANITIZE_STRING);
$release_date = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($title) < 1 || strlen($title) > 60) {
		$errors['title'] = true;
	}
	
	if (strlen($genre) < 1 || strlen($genre) > 100) {
		$errors['genre'] = true;
	}
	if (strlen($directed_by) < 1 || strlen($directed_by) > 40) {
		$errors['directed_by'] = true;
	}
	if (strlen($release_date) < 1 || strlen($release_date) > 25) {
$errors['release_date'] = true;
}
	if (strlen($starring) < 1 || strlen($starring) > 256) {
		$errors['starring'] = true;
	}
	
	if (empty($errors)){
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			UPDATE list_of_movies
			SET title = :title, genre = :genre, directed_by = :directed_by, release_date = :release_date, starring = :starring
			WHERE id = :id
		');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':title', $title, PDO::PARAM_STR);
		$sql->bindValue(':genre', $genre, PDO::PARAM_STR);
		$sql->bindValue(':directed_by', $directed_by, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_STR);
		$sql->bindValue(':starring', $starring, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}
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

<h1>Add a Movie</h1>        
        <form id="movie" action="index.php" method="post">
        
        	<label for="title">Title
            	<?php if (isset($errors['title'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="title" id="title" required value="<?php echo $title; ?>">
        	
        	<label for="genre">Genre
            	<?php if (isset($errors['genre'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
            <input type="text" name="genre" id="genre" required value="<?php echo $genre; ?>">
        	
        	<label for="directed_by">Directed By
            	<?php if (isset($errors['directed_by'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="directed_by" id="directed_by" required value="<?php echo $directed_by; ?>">
        	
        	<label for="genre">Starring
            	<?php if (isset($errors['starring'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	 <input type="text" name="starring" id="starring" required value="<?php echo $starring; ?>">
        	<label for="release_date">Release Date
            	<?php if (isset($errors['release_date'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="release_date" id="release_date" required value="<?php echo $release_date; ?>" placeholder="yyyy-mm-dd">
            
            <button type="submit">Add</button>
        </form>


</body>
</html>





