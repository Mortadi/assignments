<?php

require_once 'includes/db.php';

	$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
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
} else {
	
	$sql = $db->prepare('
		SELECT title, genre, directed_by, release_date, starring
		FROM list_of_movies
		WHERE id = :id 
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$title = $results['title'];
	$genre = $results['genre'];
	$directed_by = $results['directed_by'];
	$release_date = $results['release_date'];
	$starring = $results['starring'];	
}
?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Movies</title>
        <link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    </head>

    <body>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
         <fieldset>
        	<label for="title">Title:
            	<?php if (isset($errors['title'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="title" id="title" required value="<?php echo $title; ?>">
            
                
                <label for="genre">Genre: <?php if (isset($errors['genre'])) : ?>
            <strong class="error">is required.</strong>
            <?php endif; ?>
            </label>
            <input type="text" name="genre" id="genre" required value="<?php echo $genre; ?>">
               
               
                
                 <label for="directed_by">Directed By: <?php if (isset($errors['directed_by'])) : ?>
            <strong class="error">is required.</strong>
            <?php endif; ?>
            </label>
                <input type="text" id="directed_by" name="directed_by" required value="<?php echo $directed_by; ?>">
               
                
                <label for="starring">Starring:<?php if (isset($errors['starring'])) : ?>
            <strong class="error">is required.</strong>
            <?php endif; ?>
            </label>
                <input type="text" name="starring" id="starring" required value="<?php echo $starring; ?>">
                
            <label for="release_date">Release Date:<?php if (isset($errors['release_date'])) : ?>
            <strong class="error">is required.</strong>
            <?php endif; ?>
            </label>
            <input type="text" name="release_date" id="release_date" required value="<?php echo $release_date; ?>">
            
            
       <br>
            <button type="submit" class="save">Save</button>
        </fieldset>
        </form>
        <a href="index.php">Back to list</a>
    </body>
</html>