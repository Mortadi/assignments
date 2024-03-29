<?php

session_start();

function get_hashed_password ($password) {
	$rand = substr(
           strtr(
		       base64_encode(
			           openssl_random_pseudo_bytes(16)
					   )
					   , '+', '.')
					   , 0, 22);
		$salt = '$2a$12$' . $rand;
		return crypt($password, $salt);
}

function user_create ($db, $username, $password) {

$sql = $db->prepare('
INSERT INTO users (username, password)
VALUES (:username, :password)
');
$sql->bindValue(':username', $username, PDO::PARAM_STR);
$sql->bindValue(':password', get_hashed_password($password), PDO::PARAM_STR);
$sql->execute();

return $db->lastInsertId();	
}
function user_is_signed_in () {
if (!isset($_SESSION['user-id'])) {
	return false;
}
return true;
}
function user_get ($db, $username, $password) {
	$sql = $db->prepare('
	SELECT id, username, password
	FROM users
	WHERE username = :username
	LIMIt 1
	
	');
	
	$sql->bindValue(':username', $username, PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetch();
if (empty($user) || !passwords_match($password, $user['password'])) {
	return false;
}
return $user ['id'];
}
function passwords_match ($pass_clear_text, $pass_hashed) {
	return crypt($pass_clear_text, $pass_hashed) == $pass_hashed;
}
function user_sign_in ($user_id) {
    session_regenerate_id();
	$_SESSION['user-id'] = $user_id;
}