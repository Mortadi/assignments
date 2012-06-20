<?php


$user = getenv('DB_USER'); // MySQL username
$pass = getenv('DB_PASS'); // MySQL password
$data_source = getenv('DATA_SOURCE');

$db = new PDO($data_source, $user, $pass);

$db->exec('SET NAMES utf8');