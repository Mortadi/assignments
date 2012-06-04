<?php
require_once 'includes/db.php';
$sql = $db->query('
SELECT id, dino_name, loves_meat, in_jurassic_park 
FROM dinosaurs
ORDER BY dino_name ASC
');
//var_dump($db->errorInfo());
$resultes = $sql->fetchAll();


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Dinosaurs</title>
</head>

<body>
<?php foreach ($resultes as $dino) : ?>

<h2>
<a href="single.php?id=<?php echo $dino['id']; ?>"><?php echo $dino['dino_name']; ?></a></h2>
<dl>
<dt>Loves Meat</dt>
<dd><?php echo $dino ['loves_meat']; ?></dd>
<dt>In Jurassic Park</dt>
<dd><?php echo $dino['in_jurassic_park']; ?></dd>
</dl>
<?php endforeach; ?>


</body>
</html>