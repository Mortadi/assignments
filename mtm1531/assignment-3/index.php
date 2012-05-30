<?php
require_once "includes/form-processor.php"
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Registration Form Validation, Assignment-3</title>
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
</head>
<body>
<?php if ($completed) : ?>
<strong class="thx">Thank you for using our registration form! <a href="http://imm.edumedia.ca/elmo0008/mtm1531/assignment-3/">Back to form</a> </strong>
<?php else : ?>

<h1>Registration Form Validation</h1>
<form method="post" action="index.php">

<div>
<label for="name">Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
<input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
</div>
<div>
<label for="email">E-mail<?php if (isset($errors['email'])) : ?> <strong>Valid E-mail Address</strong><?php endif; ?></label>
<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
</div>
<div>
<label for="username">Username<?php if (isset($errors['username'])) : ?> <strong>max length 25 characters</strong><?php endif; ?></label>
<input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
</div>
<div>
<label for="password">Password<?php if (isset($errors['password'])) : ?> <strong>is required</strong><?php endif; ?></label>
<input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
</div>
<div>
<fieldset class="lang">
<legend>Preferred Language</legend>
<?php if (isset($errors['prel'])) : ?><strong>Select Language:</strong><?php endif; ?>
<input type="radio" id="english" name="prel" value="en"<?php if ($prel == 'en') {
echo ' checked'; }
?>>
<label for="english">English</label>
<input type="radio" id="french" name="prel" value="fr"<?php if ($prel == 'fr') {
echo 'checked';
}?>>
<label for="french">French</label>
<input type="radio" id="spanish" name="prel" value="sp"<?php if ($prel == 'sp') {
echo 'checked';
}?>>
<label for="spanish">Spanish</label>
</fieldset>

</div>

<div class="notes">
<label for="notes">Notes<?php if (isset($errors['notes'])) : ?><?php endif; ?></label>
<textarea id="notes" name="notes"><?php echo $notes; ?></textarea>
</div>
<div>
<label for="acceptterms">Accept Terms<?php if (isset($errors['acceptterms'])) : ?><?php endif; ?></label>
<input type="checkbox" id="acceptterms" name="acceptterms" value="<?php echo $acceptterms; ?>" required> 


<button type="submit">Send</button>
</div>
</form>
<?php endif; ?>
</body>
</html>