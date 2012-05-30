<?php
$errors = array();
$completed = false;


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$notes = filter_input(INPUT_POST,'notes', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$acceptterms = filter_input(INPUT_POST, 'acceptterms', FILTER_SANITIZE_STRING);
$prel = filter_input(INPUT_POST, 'prel', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;
	}
	
    if (strlen($username) < 1 || strlen ($username) > 25) {
		$errors['username'] = true;
	}
	
	if (strlen($notes)) { 
		$errors['notes'] = true;
	}
	
	if (empty($password)) {
		$errors['password'] = true;
	}
	
	if (!isset($_POST['acceptterms'])) {
		$errors['acceptterms'] = true;
	}
	
	if (!in_array($prel, array('en', 'fr', 'sp'))) 
{$errors['prel'] = true;
	}

    if (empty($errors)) {
     $completed = true;
     mail($email, 'Thank you for your feedback and using our registration form', "From: Mohamed <elmo0008@algonquinlive.com>\r\n");

}
}

