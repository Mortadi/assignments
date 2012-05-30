<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Registration Form Validation, Assignment-3</title>
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
</head>
<h1>Registration Form Validation</h1>
<form method="post" action="index.php">

<div>
<label for="name">Name</label>
<input type="text" id="name" name="name">
</div>
<div>
<label for="email">E-mail</label>
<input type="email" id="email" name="email">
</div>
<div>
<label for="username">Username</label>
<input type="text" id="username" name="username">
</div>
<div>
<label for="password">Password</label>
<input type="password" id="password" name="password">
</div>
<div>
<label for="preferredlang">Preferred Language</label>
<input type="radio" id="prel" name="prel">
</div>
<div>
<label for="notes">Notes</label>
<input type="textarea" id="notes" name="notes">
</div>
<div>
<label for="acceptterms">Accept Terms</label>
<input type="checkbox" id="acceptterms" name="acceptterms">
</div>
</form>
<body>
</body>
</html>